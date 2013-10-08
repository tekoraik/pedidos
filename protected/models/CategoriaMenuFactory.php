<?php

class CategoriaMenuFactory {
    private $instance = null;
    
    private function __construct() {}
    
    public static function getInstance() {
        if ($this->instance == null)
            $this->instance = new CategoriaMenuFactory();
        return $this->instance;
    }
    
    public function create($oModel) {
        return array("url" => array("route" => "site/index", "label" => "Test " . rand(100, 999)));
    }
}

?>