<?php

/**
 * This is the model class for table "linea_pedido".
 *
 * The followings are the available columns in table 'linea_pedido':
 * @property integer $id_pedido
 * @property integer $id_producto
 * @property integer $orden
 * @property string $precio
 * @property integer $cantidad
 *
 * The followings are the available model relations:
 * @property Pedido $idPedido
 */
class LineaPedido extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linea_pedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pedido, id_producto, precio', 'required'),
			array('id_pedido, id_producto, orden, cantidad', 'numerical', 'integerOnly'=>true),
			array('precio', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pedido, id_producto, orden, precio, cantidad', 'safe', 'on'=>'search'),
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
			'pedido' => array(self::BELONGS_TO, 'Pedido', 'id_pedido'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'id_producto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pedido' => 'Pedido',
			'id_producto' => 'Producto',
			'orden' => 'Numero de orden',
			'precio' => 'Precio',
			'cantidad' => 'Cantidad',
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

		$criteria->compare('id_pedido',$this->id_pedido);
		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('orden',$this->orden);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('cantidad',$this->cantidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function precioConIva() {
        return $this->precio * (1 + $this->pedido->iva);
    }
    
    public function total() {
        return $this->precioConIva() * $this->cantidad;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LineaPedido the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
