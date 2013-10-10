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
     * undocumented function
     *
     * @return void
     */
    function init() {
        if (!isset(Yii::app()->session[self::SESSION_VAR_NAME])) {
            $this->_newPedido();
            Yii::app()->session[self::SESSION_VAR_NAME] = $this->model->id;
        } else {
            $this->model = Pedido::model()->findByPk(Yii::app()->session[self::SESSION_VAR_NAME]);
            if (!$this->model)
                $this->_newPedido();
        }
    }
    
    function getModel() {
        return $this->model;
    }
    
    private function _newPedido() {
        $this->model = new Pedido();
        $this->model->id_persona = 1;
        $this->model->iva = "0.16";
        $this->model->save();
    }
}