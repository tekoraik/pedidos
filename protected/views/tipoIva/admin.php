<?php
/* @var $this TipoIvaController */
/* @var $model TipoIva */

$this->breadcrumbs=array(
	'Tipo Ivas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Iva', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-iva-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Tipos de Iva</h1>

<div class="box">
<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'tipo-iva-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'valor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
