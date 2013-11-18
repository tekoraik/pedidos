<?php
/* @var $this TipoEstadoPedidoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Estado Pedidos',
);

$this->menu=array(
	array('label'=>'Create TipoEstadoPedido', 'url'=>array('create')),
	array('label'=>'Manage TipoEstadoPedido', 'url'=>array('admin')),
);
?>

<h1>Tipo Estado Pedidos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
