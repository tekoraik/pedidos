<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */

$this->breadcrumbs=array(
	'Regla Validacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Reglas de Validacion', 'url'=>array('admin')),
);
?>
<div class="box thin">
<h1>Crear Regla de Validación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>