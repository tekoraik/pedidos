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
}