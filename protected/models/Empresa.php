<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $nombre
 * @property string $slug
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
			array('nombre, slug, host', 'required'),
			array('host', 'length', 'max'=>255),
			array('nombre', 'length', 'max'=>50),
			array('slug', 'length', 'max'=>45),
			array('nombre', 'validaNombreExiste'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, slug', 'safe', 'on'=>'search'),
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
}
