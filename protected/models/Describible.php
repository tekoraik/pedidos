<?php

/**
 * This is the model class for table "describible".
 *
 * The followings are the available columns in table 'describible':
 * @property integer $id
 * @property string $tipo
 *
 * The followings are the available model relations:
 * @property Descriptor[] $descriptors
 */
class Describible extends CActiveRecord
{
    private $valoresDescriptor = array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'describible';
	}
    
    /**
     * Before save validate
     */
    protected function beforeValidate() {
        foreach ($this->valoresDescriptor as $oValor) {
            if ($oValor->valor) {
                switch ($oValor->tipo){
                    case "entero":
                        if (!is_numeric($oValor->valor) || strpos(str_replace(",", ".", $oValor->valor), ".") !== FALSE) $this->addError($oValor->descriptor->nombre, $oValor->descriptor->nombre. " debe ser un valor entero");
                        break;
                    case "decimal":
                        if (!is_numeric($oValor->valor)) $this->addError($oValor->descriptor->nombre, $oValor->descriptor->nombre. " debe ser un valor numerico");
                        break;
                    
                }
                if ($oValor->descriptor->regla) {
                    
                    if (!$oValor->descriptor->regla->evaluar($oValor->valor)) {
                        $this->addError($oValor->descriptor->nombre, $oValor->descriptor->nombre. " no cumple con la regla de validación " . $oValor->descriptor->regla->nombre);
                    }
                }
            }
            
        }
        if ($this->hasErrors()) return false;
        else return true;
    }
    
    /**
     * After save event
     */
    protected function afterSave() {
       foreach ($this->valoresDescriptor as $oValor) {
            
            $oValor->id_describible = $this->id;
            $oValorSearched = ValorDescriptor::model()->findByPk(array("id_descriptor" => $oValor->id_descriptor, "id_describible" => $oValor->id_describible));
            if ($oValorSearched) {
                $oValorSearched->valor = $oValor->valor;
                $oValor = $oValorSearched;
            }
            $oValor->save();
        }
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo', 'required'),
			array('tipo', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tipo', 'safe', 'on'=>'search'),
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
			'descriptores' => array(self::MANY_MANY, 'Descriptor', 'valor_descriptor(id_describible, id_descriptor)'),
			'valores' => array(self::HAS_MANY, 'ValorDescriptor', 'id_describible'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('tipo',$this->tipo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Describible the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    
    /**
     * Obtener valor a partir de un descriptor
     * @param Descriptor $oDescriptor
     */
    public function buscarValor($oDescriptor) {
        foreach ($this->valores as $oValor)
            if ($oValor->id_descriptor == $oDescriptor->id)
                return $oValor->valor;
        
        return "";
    }
    
    public function getValor($sNombreAtributo) {
        foreach ($this->getAttributes() as $sName => $sValue) {
            if ($sNombreAtributo == $sName)
                return $sValue;
        }
        foreach ($this->valores as $oValor) {
            if ($oValor->descriptor->nombre == $sNombreAtributo)
                return $oValor->valor;
        }
        foreach ($this->descriptores as $oDescriptor) {
            if ($oDescriptor->nombre == $sNombreAtributo && $oDescriptor->tipo_valor == "formula") {
                return $this->evaluarFormula($oDescriptor);
            }
        }
        return "";
    }
    
    /**
     * Añadir valores de descriptores a partir de una coleccion de ValorDescriptor
     * @param array Coleccion de ValorDescriptor
     */
    public function addValores($aCamposValores) {
        
        foreach ($this->_toValores($aCamposValores) as $aValor) {
            $oValor = new ValorDescriptor;
            $oValor->attributes = $aValor;
            $this->valoresDescriptor[] = $oValor;
        }
    }
    
    /**
     * Comprueva si un descriptor es de este describible
     * @param Descriptor $oDescriptor
     */
    public function check($oDescriptor) {
        return true;
    }
    
    public function evaluarFormula($oDescriptor) {
        $data = $this;
        $sFormula = $oDescriptor->formula;
        if ($oDescriptor->tipo_valor == "formula" && $oDescriptor->formula) {
            foreach ($this->getAttributes() as $sName => $sValue) {
                $sFormula = str_replace($sName, '$data["' . $sName . '"]', $sFormula);
            }
            foreach ($this->valores as $oValor) {
                $sName = $oValor->descriptor->nombre;
                $sFormula = str_replace($sName, '$data->getValor("'.$sName.'")', $sFormula);
            }
            $sFormula .= ";";
            $sValue = @eval("return " . $sFormula);
            return $sValue;
        } else {
            return "";
        }
    }
    
    public function getNombresCampos() {
        $aResult = array();
        foreach ($this->getAttributes() as $sName => $sValue) {
            $aResult[] = $sName;
        }
        foreach ($this->valores as $oValor) {
            $aResult[] = $oValor->descriptor->nombre;
        }
        foreach ($this->descriptores as $oDescriptor) {
            if ($oDescriptor->tipo_valor == "formula")
                $aResult[] = $oDescriptor->nombre;
        }
        return $aResult;
    }
    
    private function _toValores($aCamposValores) {
        $aValores = array();
        $nCount = count($aCamposValores['valor']);
        for ($nIndex = 0; $nIndex < $nCount; $nIndex++) {
            $aValor = array();
            $aValor['valor'] = $aCamposValores['valor'][$nIndex];
            $aValor['id_describible'] = $aCamposValores['id_describible'][$nIndex];
            $aValor['id_descriptor'] = $aCamposValores['id_descriptor'][$nIndex];
            $aValor['tipo'] = $aCamposValores['tipo'][$nIndex];
            $aValores[] = $aValor;
        }
        return $aValores;
    }
}
