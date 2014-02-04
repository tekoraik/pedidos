<?php

class PedidoController extends Controller
{


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
    }

    
    
    public function allowedActions()
    {
        return 'view, addProducto, verPedidoActual, incCantidad, REST.GET, REST.PUT, REST.POST, REST.DELETE';
    }

    public function actions() {
         return array(
            'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
         );
    }
    
    public function restEvents()
    {
        $this->onRest('req.get.usuario.render', function($param1) {
            //Custom logic for this route.
            //Should output results.
            $result = Pedido::model()->with('lineas')->findAllByAttributes(array('id_usuario' => $param1));
            $this->emitRest('req.render.json', array(
                $result
            ));
        });
        
        $this->onRest('req.get.pedidoActual.render', function() {
            $oPedido = Yii::app()->pedido->getModel();
            $aPedido = $oPedido->attributes;
            $aPedido["lineas"] = array();
            foreach ($oPedido->lineas as $oLinea) {
                $aLinea = $oLinea->attributes;
                $aLinea["precioSinIVA"] = $oLinea->precioSinIVA();
                $aLinea["precioConIVA"] = $oLinea->precioConIVA();
                $aLinea["totalSinIVA"] = $oLinea->totalSinIVA();
                $aLinea["totalConIVA"] = $oLinea->totalConIVA();
                $aLinea["producto"] = $oLinea->producto->attributes;
                $aPedido["lineas"][] = $aLinea;
            }
            $aPedido["totalSinIVA"] = $oPedido->totalSinIVA();
            $aPedido["totalConIVA"] = $oPedido->totalConIVA();
            $this->emitRest('req.render.json', array(
                array("success" => true, "data" => array("totalCount" => 1, "pedido" => $aPedido))
            ));
        });
        
        $this->onRest('req.delete.lineaPedidoActual.render', function() {
            $sMessage = "";
            $bSuccess = false;
            $aData = array();
            $idProducto = isset($_GET["idProducto"]) ? $_GET["idProducto"] : "";
            if (!$idProducto) $sMessage = "idProducto not found";
            else {
                $oPedido = Yii::app()->pedido->getModel();
                $oLinea = LineaPedido::model()->findByPk(array("id_pedido" => $oPedido->id, "id_producto" => $idProducto));
                if ($oLinea) {
                    $bSuccess = $oLinea->delete();
                } else {
                    $sMessage = "Linea not found";
                }
            }
            $this->emitRest('req.render.json', array(
                array("success" => $bSuccess, "data" => $aData, "message" => $sMessage)
            ));
        });
        
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
    
    public function actionIncCantidad($id_producto, $inc = 1) {
        Yii::app()->pedido->getModel()->incCantidad($id_producto, $inc);
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pedido;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pedido']))
		{
			$model->attributes=$_POST['Pedido'];
            if (isset($_POST['ValoresDescriptor'])) {
                $model->addValores($_POST['ValoresDescriptor']);
            }
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	    $this->layout = "//layouts/column2admin";
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pedido']))
		{
		    $model->cambiarTipoEstado(TipoEstadoPedido::model()->findByPk($_POST['Pedido']['id_tipo_estado']));
			$model->attributes=$_POST['Pedido'];
            
            if (isset($_POST['ValoresDescriptor'])) {
                $model->addValores($_POST['ValoresDescriptor']);
            }
			if($model->save()) {
			    Yii::app()->user->setFlash('success','Registro salvado correctamente');
				$this->redirect(array('admin'));
            } else {
                Yii::app()->user->setFlash('error','Error al salvar el registro');
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
	    $oPedido = new Pedido();
        $oPedido->unsetAttributes();  // clear any default values
        if (Yii::app()->user->getId() == null)
            throw new CHttpException(401,'El usuario no está logueado');
        $oPedido->id_usuario = Yii::app()->user->getId();
		$dataProvider=$oPedido->search();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
	    $this->layout = "//layouts/column2admin";
		$model=new Pedido('search');
		$model->unsetAttributes();  // clear any default values
        $model->id_empresa = Yii::app()->empresa->getModel()->id;
		if(isset($_GET['Pedido']))
			$model->attributes=$_GET['Pedido'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pedido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pedido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    public function actionAddProducto($idProducto) {
        $oPedido = Yii::app()->pedido->getModel();
        $oProducto = Producto::model()->findByPk($idProducto);
        $oLinea = new LineaPedido();
        $oLinea->id_producto = $oProducto->id;
        $oLinea->precio = $oProducto->precio;
        $oLinea->iva = $oProducto->getIva();
        $oPedido->addLinea($oLinea);
        $oPedido->refresh();
        if (isset($_SERVER["HTTP_ACCEPT"]) && strpos($_SERVER["HTTP_ACCEPT"], "json") !== FALSE) {
            $aPedido = $oPedido->attributes;
            $aPedido["lineas"] = array();
            foreach ($oPedido->lineas as $oLinea) {
                $aPedido["lineas"][] = $oLinea->attributes;
            }
            $aResponse = array( "success" => true, $aPedido);
            echo json_encode($aResponse);
            Yii::app()->end();
        }
        
        $this->redirect('verPedidoActual');
    }
    
    public function actionVerPedidoActual() {
        $this->render("view", array("model" => Yii::app()->pedido->getModel()));
    }
    
   
    /**
     * Controller action for make pedido
     */
    public function actionRealizar($id, $actual = false) {
        $oPedido = Pedido::model()->findByPk($id);
        $oPedido->realizar(Yii::app()->user->getId());
        $oPedido->save();
        if ($actual)
            Yii::app()->pedido->nuevoPedido();
        if (isset($_SERVER["HTTP_ACCEPT"]) && strpos($_SERVER["HTTP_ACCEPT"], "json") !== FALSE) {
            header('Content-type: application/json');
            echo json_encode(array("success" => true));
            Yii::app()->end();
        }
        $this->render("realizado", array("model" => $oPedido));
    }
    
	/**
	 * Performs the AJAX validation.
	 * @param Pedido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pedido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
}
