<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */

$this->breadcrumbs=array(
	'Regla Validacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReglaValidacion', 'url'=>array('index')),
	array('label'=>'Create ReglaValidacion', 'url'=>array('create')),
	array('label'=>'Update ReglaValidacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReglaValidacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReglaValidacion', 'url'=>array('admin')),
);
?>

<h1>View ReglaValidacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'id_empresa',
		'tipo',
		'valor',
		'desde',
		'hasta',
	),
)); ?>
