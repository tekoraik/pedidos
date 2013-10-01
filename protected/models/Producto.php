<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id
 * @property string $nombre
 * @property string $slug
 * @property string $descripcion_corta
 * @property string $descripcion_larga
 * @property string $precio
 * @property integer $id_empresa
 * @property integer $id_categoria
 *
 * The followings are the available model relations:
 * @property Categoria $idCategoria
 * @property Empresa $idEmpresa
 */
class Producto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, slug, descripcion_corta, precio, id_empresa', 'required'),
			array('id_empresa, id_categoria', 'numerical', 'integerOnly'=>true),
			array('nombre, slug, descripcion_corta', 'length', 'max'=>100),
			array('precio', 'length', 'max'=>10),
			array('descripcion_larga', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, slug, descripcion_corta, descripcion_larga, precio, id_empresa, id_categoria', 'safe', 'on'=>'search'),
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
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
		);
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
			'descripcion_corta' => 'Descripción corta',
			'descripcion_larga' => 'Descripción larga',
			'precio' => 'Precio',
			'id_empresa' => 'Empresa',
			'id_categoria' => 'Categoria',
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
		$criteria->compare('descripcion_corta',$this->descripcion_corta,true);
		$criteria->compare('descripcion_larga',$this->descripcion_larga,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('id_categoria',$this->id_categoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
