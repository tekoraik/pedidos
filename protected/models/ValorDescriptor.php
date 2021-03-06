<?php

/**
 * This is the model class for table "valor_descriptor".
 *
 * The followings are the available columns in table 'valor_descriptor':
 * @property integer $id_descriptor
 * @property integer $id_describible
 * @property string $valor
 * @property string $tipo
 */
class ValorDescriptor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'valor_descriptor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_descriptor, id_describible', 'required'),
			array('id_descriptor, id_describible', 'numerical', 'integerOnly'=>true),
			array('valor', 'length', 'max'=>45),
			array('tipo', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_descriptor, id_describible, valor, tipo', 'safe', 'on'=>'search'),
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
		  'descriptor' => array(self::BELONGS_TO, 'Descriptor', 'id_descriptor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_descriptor' => 'Id Descriptor',
			'id_describible' => 'Id Describible',
			'valor' => 'Valor',
			'tipo' => 'Tipo',
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

		$criteria->compare('id_descriptor',$this->id_descriptor);
		$criteria->compare('id_describible',$this->id_describible);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ValorDescriptor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function evaluarReglaValidacion($oDescribible) {
        $oValor = $this->valor;
        if ($this->descriptor && $this->descriptor->hasReglaValidacion()) {
            switch ($this->descriptor->getTipoReglaValidacion()){
                case 'cadena':
                    return strlen($oValor) <= $this->descriptor->getValorReglaValidacion();
                    break;
                case 'rango':
                    return floatval($oValor) >= floatval($this->descriptor->getDesdeReglaValidacion()) && floatval($oValor) <= floatval($this->descriptor->getHastaReglaValidacion()->hasta);
                break;
                case 'longitud':
                    return strlen($oValor) <= intval($this->descriptor->getValorReglaValidacion());
                break;
                case 'formula':
                    $sFormula = $this->descriptor->getValorReglaValidacion();
                    $sFormula = str_replace('valor', '$oValor', $sFormula);
                    $aCampos = $oDescribible->getNombresCampos();
                    foreach ($aCampos as $sNombre) {
                        $sFormula = str_replace($sNombre, $oDescribible->getValor($sNombre), $sFormula);
                    }
                    $sFormula .= ";";
                    $oResult = eval("return " . $sFormula);
                    return $oResult ? true : false;
                break;
            }
        }
    }

    public function getNombreDescriptor() {
        return $this->descriptor ? $this->descriptor->nombre : "";
    }
    
    public function isVisibleDescriptor() {
        return $this->descriptor->visible;
    }
}
