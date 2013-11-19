<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */

$this->breadcrumbs=array(
	'Regla Validacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Reglas de Validacion', 'url'=>array('admin')),
	array('label'=>'Crear Regla de Validacion', 'url'=>array('create')),
	array('label'=>'Actualizar Regla de Validacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Regla de Validacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
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
	),
)); ?>
