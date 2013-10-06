<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'LineaPedidos'=>array('index'),
	'View'=>array('view', 'id_pedido'=>$model->id_pedido, 'id_producto'=>$model->id_producto),
	'Update',
);

$this->menu=array(
	array('label'=>'List LineaPedido', 'url'=>array('index')),
	array('label'=>'Create LineaPedido', 'url'=>array('create')),
	array('label'=>'View LineaPedido', 'url'=>array('view', 'id_pedido'=>$model->id_pedido, 'id_producto'=>$model->id_producto)),
	array('label'=>'Manage LineaPedido', 'url'=>array('admin')),
); 
?>

<h1>Update Client</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
