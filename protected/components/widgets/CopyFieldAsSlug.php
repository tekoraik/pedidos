<?php
	class CopyFieldAsSlug extends CWidget {
		public $model;
		public $attribute;
		public $copy;
		
		public function run() {
			Yii::app()->getClientScript()->registerScript(get_class($this->model).'-copyslug','$("#'.get_class($this->model).'_'.$this->attribute.'").change(function(oEvent) {
  				$("#'.get_class($this->model).'_'.$this->copy.'").val(oEvent.target.value.replace(/[\s_]/g, "-").toLowerCase());
			});');	
		}
	}
?>