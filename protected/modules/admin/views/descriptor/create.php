<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */

$this->breadcrumbs=array(
	'Descriptors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Descriptor', 'url'=>array('index')),
	array('label'=>'Manage Descriptor', 'url'=>array('admin')),
);
?>

<h1>Create Descriptor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>