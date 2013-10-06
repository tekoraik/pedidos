<?php

/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property integer $id
 * @property string $nombre
 * @property string $slug
 * @property integer $id_padre
 * @property integer $id_empresa
 *
 * The followings are the available model relations:
 * @property Empresa $idEmpresa
 * @property Categoria $idPadre
 * @property Categoria[] $categorias
 * @property Producto[] $productos
 */
class Categoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, slug, id_empresa', 'required'),
			array('id_padre, id_empresa', 'numerical', 'integerOnly'=>true),
			array('nombre, slug', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, slug, id_padre, id_empresa', 'safe', 'on'=>'search'),
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
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'padre' => array(self::BELONGS_TO, 'Categoria', 'id_padre'),
			'hijas' => array(self::HAS_MANY, 'Categoria', 'id_padre'),
			'productos' => array(self::HAS_MANY, 'Producto', 'id_categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'slug' => 'Slug',
			'id_padre' => 'Categoria Padre',
			'id_empresa' => 'Empresa',
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
		$criteria->compare('id_padre',$this->id_padre);
		$criteria->compare('id_empresa',$this->id_empresa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getNombreEmpresa() {
        if ($this->empresa) return $this->empresa->nombre;
        return "";
    }
    
    public function getNombrePadre() {
        if ($this->padre) return $this->padre->nombre;
        return "";
    }
}
