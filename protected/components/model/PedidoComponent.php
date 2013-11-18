<?php 
/**
 * Represents the current Empresa
 *
 * @author Jose Luis Orta
 */
class PedidoComponent extends CApplicationComponent
{
    const SESSION_VAR_NAME = "idPedidoActual";
    
    private $model;
    
    /**
     * Inicialize component, create a new Pedido if isn't established a session var
     *
     */
    public function init() {
        if (!isset(Yii::app()->session[self::SESSION_VAR_NAME])) {
            $this->_newPedido();
        } else {
            $this->model = Pedido::model()->findByPk(Yii::app()->session[self::SESSION_VAR_NAME]);
            if (!$this->model)
                $this->_newPedido();
        }
    }
    
    /**
     * Get the model object (Pedido)
     * 
     * @return Pedido Model object

     */
    public function getModel() {
        return $this->model;
    }
    
    /**
     * Reload model object, it creates new Pedido in database
     */
    public function nuevoPedido() {
        $this->_newPedido();
    }
    
    /**
     * Reload model object, it creates new Pedido in database
     * @todo Assign proper Persona and proper iva.
     */
    private function _newPedido() {
        $this->model = new Pedido();
        $this->model->id_usuario= 1;
        $this->model->iva = 0.21;
        $this->model->id_empresa = Yii::app()->empresa->getModel()->id;
        $this->model->save();
        Yii::app()->session[self::SESSION_VAR_NAME] = $this->model->id;
    }
}