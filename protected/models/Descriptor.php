<?php

/**
 * This is the model class for table "descriptor".
 *
 * The followings are the available columns in table 'descriptor':
 * @property integer $id
 * @property string $nombre
 * @property string $tipo
 * @property int $visible
 * @property integer $id_categoria
 * @property integer $id_empresa
 *
 * The followings are the available model relations:
 * @property Empresa $idEmpresa
 * @property Categoria $idCategoria
 * @property Describible[] $describibles
 */
class Descriptor extends CActiveRecord
{
    public $categoria_nombre;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'descriptor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empresa, tipo_valor', 'required'),
			array('id_categoria, id_empresa, id_regla_validacion, visible', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('formula', 'length', 'max'=>255),
			array('tipo', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, tipo, id_categoria, id_empresa, categoria_nombre', 'safe', 'on'=>'search'),
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
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'regla' => array(self::BELONGS_TO, 'ReglaValidacion', 'id_regla_validacion'),
			'describibles' => array(self::MANY_MANY, 'Describible', 'valor_descriptor(id_descriptor, id_describible)'),
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
			'tipo' => 'Tipo',
			'visible' => 'Visible',
			'id_categoria' => 'Categoria',
			'id_empresa' => 'Id Empresa',
			'formula' => 'Formula',
			'id_regla_validacion' => 'Regla de validación'
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
        $criteria->with = array('categoria');
		$criteria->compare('id',$this->id);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('tipo',$this->tipo,true);
        $criteria->compare('visible',$this->visible,false);
		$criteria->compare('id_categoria',$this->id_categoria);
		$criteria->compare('t.id_empresa',$this->id_empresa);
        $criteria->compare('categoria.nombre', $this->categoria_nombre);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Descriptor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function hasReglaValidacion() {
        return $this->regla ? true : false;
    }
    
    public function getValorReglaValidacion() {
        return $this->regla ? $this->regla->valor : null;
    }
    
    public function getDesdeReglaValidacion() {
        return $this->regla ? $this->regla->desde : null;
    }
    
    public function getHastaReglaValidacion() {
        return $this->regla ? $this->regla->hasta : null;
    }
    
    public function getTipoReglaValidacion() {
        return $this->regla ? $this->regla->tipo : null;
    }
    
    public function evaluarFormula($aCampos) {
        $oDescriptor = $this;
        $data = $this;
        $sFormula = $oDescriptor->formula;
        
        if ($oDescriptor->tipo_valor == "formula" && $oDescriptor->formula) {
            foreach ($aCampos as $sNombreCampo => $sValorCampo) {
                $sFormula = str_replace($sNombreCampo, $sValorCampo, $sFormula);
            }
            $sFormula .= ";";
            $sValue = @eval("return " . $sFormula);
            return $sValue;
        } else {
            return "";
        }
    }
}
