<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pedido', 'url'=>array('index')),
	array('label'=>'Create Pedido', 'url'=>array('create')),
	array('label'=>'Update Pedido', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pedido', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pedido', 'url'=>array('admin')),
);
?>
<div id="pedido-header" class="box">
<h1>Datos del Pedido</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions' => array("class" => "detail-view-pedido"),
	'attributes'=>array(
		'id',
		'persona.nombre',
		array(
            'label' => 'Iva',
            'type' => 'raw',
            'value' => ($model["iva"] * 100) . "%"
        ),
	),
)); ?>
</div>
<?php $this->renderPartial("_lineasPedido", array("model" => $model)); ?>
<div class="row buttons" style="text-align: center;">
<a class="button" href="<?php echo $this->createUrl("pedido/realizar", array("id" => $model->id, "actual" => true)); ?>">Realizar pedido</a>
</div>
</div>
