<?php 
/**
 * Represents the current Empresa
 *
 * @author Jose Luis Orta
 */
class EmpresaComponent extends CApplicationComponent
{
    private $model;
 
    /**
     * undocumented function
     *
     * @return void
     */
    function init() {
        $this->model = $this->getModel();
    }
    
    function getModel() {
        if (!$this->model)
            $this->model = $this->_getFromHostName();
        if (!$this->model) {
            throw new CHttpException(404,'No existe una empresa con este host');
            Yii::app()->end();
        }
        return $this->model;
    }
    
    function usuarioEsAdministrador() {
        if (Yii::app()->user->getId()){
            $oUsuario = Usuario::model()->findByPk(Yii::app()->user->getId());
            return $this->model->esAdministrador($oUsuario);
        } else return false;
    }
    
    function usuarioEsCliente() {
        if (Yii::app()->user->getId()){
            $oUsuario = Usuario::model()->findByPk(Yii::app()->user->getId());
            return $this->model->esCliente($oUsuario);
        } else return false;
    }
    
    private function _getFromHostName() {
        $sHost = "home.livetin.com";
        if (isset($_SERVER) && isset($_SERVER["HTTP_HOST"]))
        $sHost = $_SERVER['HTTP_HOST'];
        return Empresa::model()->findByAttributes(array('host' => $sHost));
    }
}