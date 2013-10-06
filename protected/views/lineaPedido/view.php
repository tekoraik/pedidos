<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'LineaPedidos'=>array('index'),
	'View',
);

$this->menu=array(
	array('label'=>'List LineaPedido', 'url'=>array('index')),
	array('label'=>'Create LineaPedido', 'url'=>array('create')),
	array('label'=>'Update LineaPedido', 'url'=>array('update', 'id_pedido'=>$model->id_pedido, 'id_producto'=>$model->id_producto)),
	array('label'=>'Delete LineaPedido', 'url'=>'delete', 
	      'linkOptions'=>array('submit'=>array('delete',
	                                           'id_pedido'=>$model->id_pedido, 'id_producto'=>$model->id_producto),
									'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LineaPedido', 'url'=>array('admin')),
);
?>

<h1>View LineaPedido</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pedido',
		'id_producto',
		'orden',
		'precio',
		'cantidad',
	),
)); ?>
