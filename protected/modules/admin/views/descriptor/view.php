<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */

$this->breadcrumbs=array(
	'Descriptors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Descriptor', 'url'=>array('index')),
	array('label'=>'Create Descriptor', 'url'=>array('create')),
	array('label'=>'Update Descriptor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Descriptor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Descriptor', 'url'=>array('admin')),
);
?>

<h1>View Descriptor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'tipo',
		'tipo_valor',
		'id_categoria',
		'id_empresa',
	),
)); ?>
