<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $nombre
 * @property string $slug
 * @property integer $id_usuario_administrador
 * @property string $color1
 * @property string $color2
 * @property string $color3
 * @property string $color4
 * 
 *
 * The followings are the available model relations:
 * @property Categoria[] $categorias
 * @property Producto[] $productos
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, slug, host, id_usuario_administrador', 'required'),
			array('id_usuario_administrador', 'numerical', 'integerOnly' => true),
			array('host, logo', 'length', 'max'=>255),
			array('color1, color2, color3, color4, color5, color6, color7, color8, color9, color10, color11, color12, color13, color14, color15', 'length', 'max'=>20),
			array('nombre', 'length', 'max'=>50),
			array('slug', 'length', 'max'=>45),
			array('nombre', 'validaNombreExiste'),
			array('logo', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, id_usuario_administrador, slug, logo, color1, color2, color3, color4, color5, color6, color7, color8, color9, color10, color11, color12, color13, color14, color15', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'categorias' => array(self::HAS_MANY, 'Categoria', 'id_empresa'),
			'productos' => array(self::HAS_MANY, 'Producto', 'id_empresa'),
			'descriptores' => array(self::HAS_MANY, 'Descriptor', 'id_empresa'),
			'administrador' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_administrador'),
		);
	}


    public function validaNombreExiste($attribute,$params) {
        $oModel = Empresa::findByAttributes(array('nombre' => $this->nombre));
        if ($oModel && $oModel->id != $this->id)
            $this->addError($attribute, "La empresa ya existe");
            
    }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador',
			'nombre' => 'Nombre',
			'slug' => 'Slug',
			'host' => 'Host',
			'id_usuario_administrador' => 'Administrador',
			'logo' => 'Logo (Alto recomendado: 52px)'		
            );
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('slug',$this->slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * Comprueva si el usuario es administrador de la empresa
     * @param Usuario $oUsuario
     * @return bool True si es administrador
     */
    public function esAdministrador($oUsuario) {
        return $oUsuario->id == $this->id_usuario_administrador;
    }
    
    /**
     * Comprueva si el usuario es cliente de la empresa
     * @param Usuario $oUsuario
     * @return bool True si el usuario es cliente
     */
    public function esCliente($oUsuario)  {
        return $oUsuario->id_empresa == $this->id;
    }
    
    public function getValorDescriptoresFormula($sNombreAtributo, $aCampos) {
        foreach ($this->descriptores as $oDescriptor) {
            if ($oDescriptor->nombre == $sNombreAtributo && $oDescriptor->tipo_valor == "formula") {
                return $oDescriptor->evaluarFormula($aCampos);
            }
        }
        return "";
    }
    
    public function getNombreDescriptoresFormula($tipo, $id_categoria, $bOnlyVisible = false) {
        $aResult = array();
        foreach ($this->descriptores as $oDescriptor) { 
            $bOkCategoria = $tipo == "pedido";
            if (!$bOkCategoria) {
                $bOkCategoria = !$oDescriptor->id_categoria;
            }
            
            if (!$bOkCategoria) {
                $bOkCategoria = $oDescriptor->id_categoria == $id_categoria;
            }
            
            if (!$bOkCategoria) {
                $oCategoria = Categoria::model()->findByPk($id_categoria);
                if (!$oCategoria) $bOkCategoria = true;
                else
                $bOkCategoria = $oCategoria->esHija($oDescriptor->id_categoria);
            }

            if (!$bOnlyVisible || $oDescriptor->visible) 
            if ($oDescriptor->tipo == $tipo)
            if ($oDescriptor->tipo_valor == "formula")
            if ($bOkCategoria)
                $aResult[] = $oDescriptor->nombre;
        }
        return $aResult;
    }
    
    public function afterSave() {
        if ($this->isNewRecord) {
            $this->_crearEstadosDePedido();
        }
    }
    
    private function _crearEstadosDePedido () {
        $this->_crearEstado("Realizado");
        $this->_crearEstado("En progreso");
        $this->_crearEstado("Finalizado");
    }
    private function _crearEstado($sNombre) {
        $oEstado = new TipoEstadoPedido();
        $oEstado->id_empresa = $this->id;
        $oEstado->nombre = $sNombre;
        $oEstado->save();
    }
}
