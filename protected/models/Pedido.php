<?php

/**
 * This is the model class for table "pedido".
 *
 * The followings are the available columns in table 'pedido':
 * @property integer $id
 * @property integer $realizado
 * @property string $fecha_realizado
 * @property integer $id_usuario
 * @property string $iva
 *
 * The followings are the available model relations:
 * @property LineaPedido[] $lineaPedidos
 * @property Usuario $idUsuario
 */
class Pedido extends Describible
{
    public $nombreEstado = "";
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
			array('id_usuario, iva', 'required'),
			array('realizado, id_usuario, id_tipo_estado', 'numerical', 'integerOnly'=>true),
			array('iva', 'length', 'max'=>10),
			array('fecha_realizado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, realizado, id_tipo_estado, fecha_realizado, id_usuario, iva', 'safe', 'on'=>'search'),
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
			'realizado' => 'Realizado',
			'fecha_realizado' => 'Fecha realizado',
			'fecha_finalizado' => 'Fecha finalizado',
			'id_usuario' => 'Usuario',
			'iva' => 'IVA',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('iva',$this->iva,true);
        $criteria->compare('id_tipo_estado',$this->id_tipo_estado);
        $criteria->compare('id_empresa',$this->id_empresa);
        $criteria->addCondition("id_tipo_estado IS NOT NULL");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
    public function realizar() {
        $this->id_tipo_estado = TipoEstadoPedido::model()->findByAttributes(array("id_empresa" => $this->empresa->id, "nombre" => "Realizado"))->id;
        $this->fecha_realizado = date("Y-m-d h:i:s");
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
            $nTotal += call_user_method($sTotalizador, $oLinea);
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
        return $this->fecha_realizado;
    }
    
    /**
     * Get value
     * 
     * @return string FechaFinalizado of pedido
     */
    public function getFechaFinalizado() {
        return $this->fecha_finalizado;
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
}
