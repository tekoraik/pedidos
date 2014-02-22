<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */

$this->breadcrumbs=array(
	'Regla Validacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReglaValidacion', 'url'=>array('index')),
	array('label'=>'Manage ReglaValidacion', 'url'=>array('admin')),
);
?>

<h1>Create ReglaValidacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>