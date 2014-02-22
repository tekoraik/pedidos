<?php

/**
 * This is the model class for table "pedido".
 *
 * The followings are the available columns in table 'pedido':
 * @property integer $id
 * @property integer $realizado
 * @property string $fecha_realizado
 * @property integer $id_usuario
 *
 * The followings are the available model relations:
 * @property LineaPedido[] $lineaPedidos
 * @property Usuario $idUsuario
 */
class Pedido extends Describible
{
    public $nombreEstado;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, id_tipo_estado', 'numerical', 'integerOnly'=>true),
			array('fecha_realizado, fecha_inicio', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_tipo_estado, fecha_realizado, fecha_inicio, fecha_finalizado, id_usuario, nombreEstado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array_merge(parent::relations(), array(
			'lineas' => array(self::HAS_MANY, 'LineaPedido', 'id_pedido'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'tipoEstado' => array(self::BELONGS_TO, 'TipoEstadoPedido', 'id_tipo_estado'),
		));
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha_realizado' => 'Fecha realizado',
			'fecha_finalizado' => 'Fecha finalizado',
			'fecha_inicio' => 'Fecha inicio',
			'nombreEstado' => 'Estado',
			'id_usuario' => 'Usuario',
			'id_tipo_estado' => 'Estado',
		);
	}

    /**
     * Before save event
     */
    protected function beforeSave() {
        parent::beforeSave();
        if (!$this->fecha_finalizado && $this->tipoEstado) 
            if ($this->tipoEstado->nombre == "finalizado")
                $this->fecha_finalizado = date("Y-m-d h:i:s");
        
    
        if ($this->isNewRecord) {
            //ok, creamos el describible
            $oDescribible = new Describible;
            $oDescribible->tipo = 'pedido';
            $oDescribible->save();
            $this->id = $oDescribible->id;
        }
        return true;
    }
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->with = array('tipoEstado');
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.id_usuario',$this->id_usuario);
        $criteria->compare('t.id_tipo_estado',$this->id_tipo_estado);
        $criteria->compare('t.id_empresa',$this->id_empresa);
        $criteria->compare('tipoEstado.nombre',$this->nombreEstado, true);
        $criteria->addCondition("t.id_tipo_estado IS NOT NULL");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder' => 't.id desc',
            'attributes'=>array(
                'nombreEstado'=>array(
                    'asc'=>'tipoEstado.nombre',
                    'desc'=>'tipoEstado.nombre DESC',
                ),
                '*',
            )),
		));
	}
    
    public function incCantidad($id_producto, $inc = 1) {
        if (($oLinea = $this->_buscarLineaIdProducto($id_producto)) !== NULL) {
            if (($oLinea->cantidad + $inc) >= 1) {
                $oLinea->cantidad += $inc;
                $oLinea->save();
            }
        }
    }
    
    /**
     * Add line to Pedido, if this product already is in Pedido add 1 to cantidad
     * @param LineaPedido Pedido line
     */
    public function addLinea($oLinea) {
        $oLinea->id_pedido = $this->id;
        $oLinea = $this->_buscarLineaProducto($oLinea);
        if ($oLinea->cantidad == null) $oLinea->cantidad = 0;
        $oLinea->cantidad++;
        $oLinea->save();
        
    }
    
    /**
     * Calculates total without iva
     * 
     * @return number Total of Pedido without iva
     */
	public function totalSinIva() {
	    return $this->_total("totalSinIva");
	}
    
    /**
     * Calculates total of Pedido with iva
     * 
     * @return number Total of Pedido with iva
     */
    public function totalConIva() {
        return $this->_total("totalConIva");
    }
	
    /**
     * Make pedido, put fecha_realizado with date now and change the state
     */
    public function realizar($id_usuario) {
        $tipoRealizado = TipoEstadoPedido::model()->findByAttributes(array("id_empresa" => $this->empresa->id, "nombre" => "Realizado"));
        $this->cambiarTipoEstado($tipoRealizado);
        $this->id_usuario = $id_usuario;
        $this->id_tipo_estado = $tipoRealizado->id;
    }
    
    public function cambiarTipoEstado($nuevoTipoEstado) {
        $sNow = date("Y-m-d h:i:s");
        if ($nuevoTipoEstado && (!$this->tipoEstado || $nuevoTipoEstado->nombre != $this->tipoEstado->nombre)){
            switch ($nuevoTipoEstado->nombre) {
                case "Realizado":
                    $this->fecha_realizado = $sNow;
                    break;
                case "En progreso":
                    $this->fecha_inicio= $sNow;
                    break;
                case "Finalizado":
                    $this->fecha_finalizado = $sNow;
                    break;
            }
        }
    }
    
    /**
     * It goes over all lines and apply the given method
     * 
     * @param string $sTotalizador Name of method that calculates sum
     * @return number Total
     */
	private function _total($sTotalizador) {
	    $nTotal = 0;
		foreach ($this->lineas as $oLinea) 
            $nTotal += call_user_func(array($oLinea, $sTotalizador));
        return $nTotal;
	}
	
    /**
     * Search line that contains the same product
     * 
     * @param LineaPedido $oLinea
     * @return LineaPedido Linea that contains the same product or enter param otherwise
     */
    private function _buscarLineaProducto($oLinea) {
        $nIdProducto = $oLinea->id_producto;
        foreach ($this->lineas as $oLineaCandidata) {
            if ($oLineaCandidata->id_producto == $nIdProducto) {
                return $oLineaCandidata;
            }
        }
        return $oLinea;
    }
    
    private function _buscarLineaIdProducto($nIdProducto) {
        foreach ($this->lineas as $oLineaCandidata) {
            if ($oLineaCandidata->id_producto == $nIdProducto) {
                return $oLineaCandidata;
            }
        }
        return null;
    }
    
    /**
     * Get name of state
     * 
     * @return string Name of state
     */
    public function getNombreEstado() {
        return $this->tipoEstado ? $this->tipoEstado->nombre : "";
    }
    
    /**
     * Get name of client
     * 
     * @return string Name of client
     */
    public function getNombreCliente() {
        return $this->usuario ? $this->usuario->nombre : "Anónimo";
    }
    
    /**
     * Get value
     * 
     * @return string FechaRealizado of pedido
     */
    public function getFechaRealizado() {
        return $this->fecha_realizado ? substr($this->fecha_realizado, 0, 10) : "";
    }
    
    /**
     * Get value
     * 
     * @return string FechaFinalizado of pedido
     */
    public function getFechaFinalizado() {
        return $this->fecha_finalizado ? substr($this->fecha_finalizado, 0, 10) : "";
    }
    
    /**
     * Get number of lines
     */
     public function numeroLineas() {
         return count($this->lineas);
     }
     
     public function getFechaInicio() {
         return $this->fecha_inicio ? substr($this->fecha_inicio, 0, 10) : "";
     }
    
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pedido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getNombreDescriptoresFormulaEmpresa($bOnlyVisible = false) {
        if ($this->empresa)
            return $this->empresa->getNombreDescriptoresFormula("pedido", null, $bOnlyVisible);
        else
            return array();
        
    }
    
    public function getValorDescriptoresFormulaEmpresa($sNombreAtributo, $aCampos) {
        if ($this->empresa)
        return $this->empresa->getDescriptoresFormula($sNombreAtributo, $aCampos);
        else
            return "";
    }
}
