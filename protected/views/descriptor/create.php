<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */

$this->breadcrumbs=array(
	'Descriptors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Descriptores', 'url'=>array('admin')),
);
?>
<div class="box thin">
<h1>Create Descriptor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>