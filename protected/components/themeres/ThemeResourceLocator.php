<?php 
/**
 * Locate resources when it works with themes, often we want load a custom theme resource in a view that isn't part of a theme.
 *
 * @author Jose Luis Orta
 */
class ThemeResourceLocator extends CApplicationComponent
{
    private $absolutePath = "";
    private $defaultPath = "";
    private $themePath = "";
 
    /**
     * undocumented function
     *
     * @return void
     */
    function init() {
        $this->absolutePath = dirname(__FILE__)."/../../..";
        if (Yii::app()->theme)
            $this->themePath = $this->absolutePath . Yii::app()->theme->getBasePath();
        else 
            $this->themePath = $this->absolutePath;

    }
    /**
     * Locate a resource in the current theme
     *
     * @param string $sResourcePath Path of the resource without theme (Ex. /img/logo.png)
     * @return URL of resource. If this resource doesn't exist in the theme path returns default path resources
     */
    function locateResource($sResourcePath, $bAbsoluteUrl = false) {
        if (file_exists($this->themePath . $sResourcePath)) {
               return Yii::app()->getBaseUrl($bAbsoluteUrl) . Yii::app()->theme->getBaseUrl();
        } else {
            return Yii::app()->getBaseUrl($bAbsoluteUrl);
        }
    }
}