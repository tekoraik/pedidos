<?php
/* @var $this TipoEstadoPedidoController */
/* @var $model TipoEstadoPedido */

$this->breadcrumbs=array(
	'Tipo Estado Pedidos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tipo de Estados de Pedido', 'url'=>array('admin')),
	array('label'=>'Crear Tipo de Estados de Pedido', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Estados de Pedido', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Tipo de Estados de Pedido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View TipoEstadoPedido #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_empresa',
		'nombre',
	),
)); ?>
