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
 * @property string $imagen
 * @property integer $id_empresa
 * @property integer $id_categoria
 *
 * The followings are the available model relations:
 * @property Categoria $idCategoria
 * @property Empresa $idEmpresa
 */
class Producto extends Describible
{
    public $categoria_nombre;
    public $tipo_iva_nombre;
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
			array('nombre, slug, descripcion_corta, precio, id_empresa, id_tipo_iva', 'required'),
			array('id_empresa, id_categoria, id_tipo_iva', 'numerical', 'integerOnly'=>true),
			array('nombre, slug', 'length', 'max'=>100),
			array('descripcion_corta', 'length', 'max'=>80),
			array('id', 'validaEnLineaPedido', 'on' => 'delete'),
			array('precio', 'length', 'max'=>10),
			array('imagen', 'length', 'max'=>255),
			array('descripcion_larga', 'safe'),
			array('id_empresa', 'validaEsMismaEmpresa'),
			array('imagen', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, slug, descripcion_corta, descripcion_larga, precio, imagen, id_empresa, id_categoria, categoria_nombre, tipo_iva_nombre', 'safe', 'on'=>'search'),
        );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array_merge(parent::relations(), array(
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'id_categoria'),
			'lineasPedido' => array(self::HAS_MANY, 'LineaPedido', 'id_producto'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'tipoIva' => array(self::BELONGS_TO, 'TipoIva', 'id_tipo_iva'),
		));
	}
    
    /**
     * Before validate event
     */
    protected function beforeValidate() {  
        $this->precio = str_replace(",", ".", $this->precio); //fix price
        $this->calculateSlug();
       
        return parent::beforeValidate();
    }
    
    
    protected function beforeDelete() {
        parent::beforeDelete();
        $this->validaEnLineaPedido("id", array());
        return !$this->hasErrors();
    }
    /**
     * Before save event
     */
    protected function beforeSave() {
        if ($this->isNewRecord) {
            //ok, creamos el describible
            $oDescribible = new Describible;
            $oDescribible->tipo = 'producto';
            $oDescribible->save();
            $this->id = $oDescribible->id;
        }
        return true;
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
			'imagen' => 'Imagen',
			'id_empresa' => 'Empresa',
			'id_categoria' => 'Categoria',
			'categoria_nombre' => 'Categoria',
			'tipo_iva_nombre' => "Tipo de iva",
		);
	}
	/**
	 * Comprueba la restricción de que un producto debe ser de la misma empresa que la categoria
	 * This is the 'validaEsMismaEmpresa' validator as declared in rules().
	 */
	public function validaEsMismaEmpresa($attribute,$params)
	{ 
		if ($this->categoria && $this->id_empresa != $this->categoria->id_empresa)
	      $this->addError($attribute, 'La empresa debe ser igual que la empresa de la categoria ('.$this->categoria->empresa->nombre.')');
    }
    
    /**
     * Comprueva si el producto se encuentra en una LineaPedido, si es así añade el error
     */
    public function validaEnLineaPedido($attribute, $params) {
        if (count($this->lineasPedido) > 0){
            $this->addError($attribute, 'El producto ya se encuentra en una linea de pedido, no es posible borrarlo');
        }
    }
    
    /**
     * Calculate slug for this model
     */
    public function calculateSlug() {
        $this->slug = strtolower(str_replace(array(" ", "_"), array("-", "-"), $this->nombre)).rand(1, 100);
    }
    
    
    public function getFormattedIva() {
        return (($this->getIva())* 100) . "%";
    }
    
    public function getFormattedPrecio() {
        return ($this->precio . "€");
    }
    
    public function getFormattedTotal() {
        return (number_format($this->precio + $this->precio * $this->getIva(), 2)) . "€";
    }
    
    public function getIva() {
        if ($this->tipoIva) {
            $nIva = $this->tipoIva->valor;
        } else {
            $nIva = 0.21;
        }
        return $nIva;
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
        $criteria->with = array('categoria', 'tipoIva');
		$criteria->compare('id',$this->id);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('descripcion_corta',$this->descripcion_corta,true);
		$criteria->compare('descripcion_larga',$this->descripcion_larga,true);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('t.id_empresa',$this->id_empresa);
        $criteria->compare('categoria.nombre',$this->categoria_nombre);
        $criteria->compare('tipoIva.nombre', $this->tipo_iva_nombre);
        if ($this->categoria) {
                $criteria->compare('id_categoria',$this->categoria->id, false, "AND");
                $this->_addCriteriaSubCategorias($criteria, $this->categoria);
        }
        else
		        $criteria->compare('id_categoria',$this->id_categoria);
        
        $criteria->compare('imagen',$this->imagen,true);
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /**
     * Search producto with nombre, descripcion_corta or descripcion_larga
     * @return CActiveDataProvider Result
     */
    public function partialSearch() {

        $criteria=new CDbCriteria;
        $criteria->compare('t.nombre',$this->nombre, true, "OR");
        $criteria->compare('t.descripcion_corta',$this->descripcion_corta, true, "OR");
        $criteria->compare('t.descripcion_larga',$this->descripcion_larga, true, "OR");
         $criteria->compare('t.id_empresa',$this->id_empresa, false);
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
    
    /**
     * Comprueva si el producto es de una categoria
     * @param int id_categoria
     */
    public function checkCategoria($id_categoria) {
            
        if (!$this->categoria || !$id_categoria)
            return true;
        
        if ($this->categoria && $id_categoria)
                return $id_categoria == $this->categoria->id || $this->_esCategoriaHija($id_categoria); 
        
        
        return false;
    }
    
    private function _esCategoriaHija($id_categoria) {
        $oCategoria = $this->categoria->padre;
        while ($oCategoria) {
            if ($oCategoria->id == $id_categoria)
                return true;
            $oCategoria = $oCategoria->padre;
        }
        return false;
    }
    
    private function _addCriteriaSubCategorias($criteria, $oCategoria) {
        if ($oCategoria->hijas) {
            foreach ($oCategoria->hijas as $oCategoriaHija) {
                $criteria->compare('id_categoria',$oCategoriaHija->id, false, "OR");
                $this->_addCriteriaSubCategorias($criteria, $oCategoriaHija);
            }
        }
    }
    
    public function getNombreDescriptoresFormulaEmpresa($bOnlyVisible = false) {
        if ($this->empresa)
            return $this->empresa->getNombreDescriptoresFormula("producto", $this->categoria ? $this->categoria->id : null, $bOnlyVisible);
        else 
            return array();
    }
    
    public function getValorDescriptoresFormulaEmpresa($sNombreAtributo, $aCampos) {
        if ($this->empresa)
            return $this->empresa->getValorDescriptoresFormula($sNombreAtributo, $aCampos);
        else
            return "";
    }
    
    public function getImagePath() {
        if ($this->imagen) return "img/productos/" . $this->imagen;
        else return "img/no-disponible.jpg";
    }
}
?>