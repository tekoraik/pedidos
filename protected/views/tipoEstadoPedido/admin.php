<?php
/* @var $this TipoEstadoPedidoController */
/* @var $model TipoEstadoPedido */

$this->breadcrumbs=array(
	'Tipo Estado Pedidos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Estados de Pedido', 'url'=>array('admin')),
	array('label'=>'Crear Tipo de Estados de Pedido', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipo-estado-pedido-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box">
<h1>Gestionar Tipo de estados de pedidos</h1>




<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'tipo-estado-pedido-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>