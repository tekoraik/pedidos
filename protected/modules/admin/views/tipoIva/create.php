<?php
/* @var $this TipoIvaController */
/* @var $model TipoIva */

$this->breadcrumbs=array(
	'Tipo Ivas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoIva', 'url'=>array('index')),
	array('label'=>'Manage TipoIva', 'url'=>array('admin')),
);
?>

<h1>Create TipoIva</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>