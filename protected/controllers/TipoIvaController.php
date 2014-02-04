<?php

class TipoIvaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2admin';

	/**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'rights'
        );
    }

	/**
     * Allowed actions by Rights module
     */
    public function allowedActions()
    {
        return 'index';
    }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
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
		$model=new TipoIva;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TipoIva']))
		{
			$model->attributes=$_POST['TipoIva'];
            $model->id_empresa = Yii::app()->empresa->getModel()->id;
			if($model->save()) {
			    Yii::app()->user->setFlash('success','Registro salvado correctamente');
				$this->redirect(array('admin','id'=>$model->id));
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

		if(isset($_POST['TipoIva']))
		{
			$model->attributes=$_POST['TipoIva'];
			if($model->save()) {
			    Yii::app()->user->setFlash('success','Registro salvado correctamente');
				$this->redirect(array('admin','id'=>$model->id));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TipoIva');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TipoIva('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['TipoIva']))
			$model->attributes=$_GET['TipoIva'];
        $model->id_empresa = Yii::app()->empresa->getModel()->id;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TipoIva the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TipoIva::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TipoIva $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tipo-iva-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
