<?php
/* @var $this TipoEstadoPedidoController */
/* @var $model TipoEstadoPedido */

$this->breadcrumbs=array(
	'Tipo Estado Pedidos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tipo de Estados de Pedido', 'url'=>array('admin')),
	array('label'=>'Crear Tipo de Estados de Pedido', 'url'=>array('create')),
	array('label'=>'Ver Tipo de Estados de Pedido', 'url'=>array('view', 'id'=>$model->id)),
);
?>
<div class="box thin">
<h1>Actualizar Tipo de Estados de pedido <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>