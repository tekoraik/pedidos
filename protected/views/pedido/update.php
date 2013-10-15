<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listado de pedidos', 'url'=>array('admin')),
);
?>
<div class="box">
<h1>Pedido <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
<?php $this->renderPartial("_lineasPedido", array("model" => $model, "options" => array("buttons" => false, "thin" => false))); ?>