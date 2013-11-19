<?php

class ProductoController extends Controller
{
	
    public $layout = "//layouts/column2admin";
    public $baseImagePath;
    
    /**
     * Init function
     */
    public function init() {
        parent::init();
        $this->baseImagePath = Yii::app()->basePath.'/../img/productos/';
    }
    
	/**
	 * @return array action filters
	 */
	public function filters()
	{
	    return array(
            'rights',
            array(
                'ext.starship.RestfullYii.filters.ERestFilter + 
                REST.GET, REST.PUT, REST.POST, REST.DELETE'
            ),
        );
        
		/*return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);*/
        
	}
    
    /**
     * Allowed actions by Rights module
     */
    public function allowedActions()
    {
        return 'index, REST.GET, REST.PUT, REST.POST, REST.DELETE';
    }
    
    public function actions() {
         return array(
            'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
         );
    }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	    $this->layout = "//layouts/2columnas";
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Producto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Producto']))
		{  
			$model->attributes=$_POST['Producto'];
            $model->id_empresa = Yii::app()->empresa->getModel()->id;
            if (isset($_POST['ValoresDescriptor'])) {
                $model->addValores($_POST['ValoresDescriptor']);
            }
            $uploadedFile=CUploadedFile::getInstance($model,'imagen');
            
            $fileName = $this->_createImageFileName($model, $uploadedFile);
            $model->imagen = $fileName;
			if($model->save()) {
			    Yii::app()->user->setFlash('success','Registro salvado correctamente');
			    if ($uploadedFile)
                $uploadedFile->saveAs($this->baseImagePath.$fileName);
				$this->redirect(array('update','id'=>$model->id));
            }
		}
		

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Producto']))
		{
			$model->attributes=$_POST['Producto'];
            if (isset($_POST['ValoresDescriptor'])) {
                $model->addValores($_POST['ValoresDescriptor']);
            }
            $uploadedFile=CUploadedFile::getInstance($model,'imagen');
            $model->imagen = $this->_createImageFileName($model, $uploadedFile);
			if($model->save()) {
			    Yii::app()->user->setFlash('success','Registro salvado correctamente');
			    if(!empty($uploadedFile))
                    $uploadedFile->saveAs($this->baseImagePath.$model->imagen);
				$this->redirect(array('update','id'=>$model->id));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    
    private function _createImageFileName($model, $oUploadedFile) {
        if ($oUploadedFile)
        return rand(). "-" . $model->slug . "." . strtolower($oUploadedFile->getExtensionName());
        return "";
    }
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($categoria_slug = "{no_slug}")
	{
	    $this->layout = "//layouts/2columnas";
	    $model=new Producto('search');
        $model->unsetAttributes();
        $model->categoria = Categoria::model()->findByAttributes(array("slug" => $categoria_slug));
		$model->id_empresa = Yii::app()->empresa->getModel()->id;
		$this->render('index',array(
			'dataProvider'=>$model->search(),
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Producto('search');
        
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Producto']))
			$model->attributes=$_GET['Producto'];
        $model->id_empresa = Yii::app()->empresa->getModel()->id;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Producto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Producto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Producto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='producto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
