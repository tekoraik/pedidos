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
        $this->model = Empresa::model()->findByPk(1);
    }
    
    function getModel() {
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
}