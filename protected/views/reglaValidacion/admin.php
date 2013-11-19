<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */

$this->breadcrumbs=array(
	'Regla Validacions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear Regla de Validación', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#regla-validacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box">
<h1>Gestionar Reglas de Validación</h1>



<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'regla-validacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'tipo',
		'valor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
