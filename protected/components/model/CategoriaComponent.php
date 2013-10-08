<?php 
/**
 * Represents the current Empresa
 *
 * @author Jose Luis Orta
 */
class CategoriaComponent extends CApplicationComponent
{
 
    /**
     * undocumented function
     *
     * @return void
     */
    function init() {
    }
    
    function getModel() {
        return new Categoria();
    }
    
    function getMenu($aCategorias) {
        return $this->_createMenu($aCategorias, true);
    }
    
    private function _createItem($oCategoria) {
        $aItem = array();
        $aItem["url"] = array();
        $aItem["url"]["route"] = "producto/categoria/" . $oCategoria->slug;
        $aItem["label"] = $oCategoria->nombre;
        if (count($oCategoria->hijas) > 0) {
            $aSubMenu = $this->_createMenu($oCategoria->hijas);
            $aItem = array_merge($aItem, $aSubMenu);
        }
        return $aItem;
    }
    
    private function _createMenu($aCategorias, $bOnlyParent = false) {
        $aMenu = array();
        foreach ($aCategorias as $oCategoria) {
            if (($bOnlyParent && !$oCategoria->padre) || !$bOnlyParent) {
                $aMenu[] = $this->_createItem($oCategoria);
            }
        }
        return $aMenu;
    }
}