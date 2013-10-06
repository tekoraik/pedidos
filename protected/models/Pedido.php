<?php

/**
 * This is the model class for table "pedido".
 *
 * The followings are the available columns in table 'pedido':
 * @property integer $id
 * @property integer $realizado
 * @property string $fecha_realizado
 * @property integer $id_persona
 * @property string $iva
 *
 * The followings are the available model relations:
 * @property LineaPedido[] $lineaPedidos
 * @property Persona $idPersona
 */
class Pedido extends CActiveRecord
{
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
			array('id_persona, iva', 'required'),
			array('realizado, id_persona', 'numerical', 'integerOnly'=>true),
			array('iva', 'length', 'max'=>10),
			array('fecha_realizado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, realizado, fecha_realizado, id_persona, iva', 'safe', 'on'=>'search'),
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
			'lineaPedidos' => array(self::HAS_MANY, 'LineaPedido', 'id_pedido'),
			'idPersona' => array(self::BELONGS_TO, 'Persona', 'id_persona'),
		);
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
			'id_persona' => 'Persona',
			'iva' => 'IVA',
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
		$criteria->compare('realizado',$this->realizado);
		$criteria->compare('fecha_realizado',$this->fecha_realizado,true);
		$criteria->compare('id_persona',$this->id_persona);
		$criteria->compare('iva',$this->iva,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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