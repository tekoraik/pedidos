<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */

$this->breadcrumbs=array(
	'Descriptors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Descriptor', 'url'=>array('index')),
	array('label'=>'Create Descriptor', 'url'=>array('create')),
	array('label'=>'View Descriptor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Descriptor', 'url'=>array('admin')),
);
?>

<h1>Update Descriptor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>