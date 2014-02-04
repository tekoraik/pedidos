<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listado de Pedidos', 'url'=>array('admin')),
);
?>

<h1>Create Pedido</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>