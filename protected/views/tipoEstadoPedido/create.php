<?php
/* @var $this TipoEstadoPedidoController */
/* @var $model TipoEstadoPedido */

$this->breadcrumbs=array(
	'Tipo Estado Pedidos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Estados de Pedido', 'url'=>array('admin')),
);
?>

<div class="box thin">
<h1>Create TipoEstadoPedido</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>