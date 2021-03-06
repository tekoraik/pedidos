<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	    if (!Yii::app()->empresa->getModel()) {
	        $this->redirect(Yii::app()->getBaseUrl()."/admin");
	    } else {
		  $this->forward('producto/index');
        }
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    $this->layout = false;
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";
                
				mail(Yii::app()->empresa->getModel()->administrador->email ,$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Gracias por contactar con nosotros, nos pondremos en contacto contigo lo antes posible');
				//$this->refresh();
				die();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
        if (!Yii::app()->empresa->getModel()) {
            $this->layout = "column2";
        }
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
        if (isset($_SERVER["HTTP_ACCEPT"]) && strpos($_SERVER["HTTP_ACCEPT"], "json") !== FALSE) {
            $this->layout = false;
            header('Content-type: application/json');
            $model->username = isset($_REQUEST["mail"]) ? $_REQUEST["mail"] : "";
            $model->password= isset($_REQUEST["pass"]) ? $_REQUEST["pass"] : "";
            if($model->validate() && $model->login()) {
                echo json_encode(array("success" => true, "message" => "User is authorized", "data" => Usuario::model()->findByPk(Yii::app()->user->getId())->attributes));
            } else {
                echo json_encode(array("success" => false, "message" => "User is no authorized", "data" => ""));
            }
            Yii::app()->end();
        }
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) 
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
	    $sReturnUrl = Yii::app()->homeUrl;
	    if (!Yii::app()->empresa->getModel()) {
            $this->layout = "column2";
            $sReturnUrl = Yii::app()->getBaseUrl() . '/admin';
        }
		Yii::app()->user->logout();
		$this->redirect($sReturnUrl);
	}
}