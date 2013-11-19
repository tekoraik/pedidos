<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */

$this->breadcrumbs=array(
	'Descriptors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Descriptores', 'url'=>array('admin')),
	array('label'=>'Crear Descriptor', 'url'=>array('create')),
	array('label'=>'Actualizar Descriptor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Descriptor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
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
