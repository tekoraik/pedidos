<?php 
/**
 * Represents the current Empresa
 *
 * @author Jose Luis Orta
 */
class CategoriaComponent extends CApplicationComponent
{
    private $nRoots = null;
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
    
    function getWidthItem($aCategorias, $nAdd = 0) { return round(720/ ($this->_countRoots($aCategorias) + $nAdd)); }
    
    function getMenu($aCategorias) {
        return $this->_createMenu($aCategorias, true);
    }
    
    private function _createItem($oCategoria, $nItems = 6) {
        $aItem = array();
        $aItem["url"] = array();
        $aItem["url"]["route"] = "producto/categoria/" . $oCategoria->slug;
        $aItem["label"] = $oCategoria->nombre;
        $aItem["url"]["htmlOptions"] = array( "style" => "width: " . round(700/ $nItems) . "px;");
        if (count($oCategoria->hijas) > 0) {
            $aSubMenu = $this->_createMenu($oCategoria->hijas);
            $aItem = array_merge($aItem, $aSubMenu);
        }
        return $aItem;
    }
    
    private function _createMenu($aCategorias, $bOnlyParent = false, $nAdditionalItems = 0) {
        $aMenu = array();
        $this->nRoots = $this->nRoots === null ? $this->_countRoots($aCategorias) : $this->nRoots;
        foreach ($aCategorias as $oCategoria) {
            if (($bOnlyParent && !$oCategoria->padre) || !$bOnlyParent) {
                $aMenu[] = $this->_createItem($oCategoria, $this->nRoots + $nAdditionalItems);
            }
        }
        return $aMenu;
    }
    
    private function _countRoots($aCategorias) {
        $nCount = 0;
        foreach ($aCategorias as $oCategoria) {
            if (!$oCategoria->padre) {
                $nCount++;
            }
        }
        return $nCount;
    }
}