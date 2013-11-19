<?php

/**
 * This is the model class for table "regla_validacion".
 *
 * The followings are the available columns in table 'regla_validacion':
 * @property integer $id
 * @property string $nombre
 * @property integer $id_empresa
 * @property string $tipo
 * @property string $valor
 *
 * The followings are the available model relations:
 * @property Descriptor[] $descriptors
 */
class ReglaValidacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'regla_validacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_empresa, tipo', 'required'),
			array('id, id_empresa', 'numerical', 'integerOnly'=>true),
			array('desde, hasta', 'numerical'),
			array('nombre', 'length', 'max'=>45),
			array('tipo', 'length', 'max'=>8),
			array('valor', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, id_empresa, tipo, valor', 'safe', 'on'=>'search'),
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
			'descriptores' => array(self::HAS_MANY, 'Descriptor', 'id_regla_validacion'),
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
			'id_empresa' => 'Id Empresa',
			'tipo' => 'Tipo',
			'valor' => 'Valor',
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
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('valor',$this->valor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReglaValidacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function evaluar($oValor) {

        switch ($this->tipo){
            case 'rango':
                return floatval($oValor) >= floatval($this->desde) && floatval($oValor) <= floatval($this->hasta);
            break;
            case 'longitud':
                return strlen($oValor) <= intval($this->valor);
            break;
            case 'formula':
                $sFormula = $this->valor;
                $sFormula = str_replace('valor', '$oValor', $sFormula);
                $sFormula .= ";";
                $oResult = eval("return " . $sFormula);
                return $oResult ? true : false;
            break;
        }
    }
}
