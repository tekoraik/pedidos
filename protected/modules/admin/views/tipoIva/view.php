<?php
/* @var $this TipoIvaController */
/* @var $model TipoIva */

$this->breadcrumbs=array(
	'Tipo Ivas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoIva', 'url'=>array('index')),
	array('label'=>'Create TipoIva', 'url'=>array('create')),
	array('label'=>'Update TipoIva', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipoIva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoIva', 'url'=>array('admin')),
);
?>

<h1>View TipoIva #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'valor',
	),
)); ?>
