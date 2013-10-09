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

<h1>View Pedido #<?php echo $model->id; ?></h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'lineas-pedido-grid',
    'dataProvider'=>new CActiveDataProvider('LineaPedido', array('data' => $model->lineas)),
    'columns'=>array(
        'producto.nombre',
        array(
            "name" => "Precio sin iva",
            "value" => function ($data, $row) { return $data["precio"]; }
        ),
        array(
            "name" => "Precio con iva",
            "value" => function ($data, $row) { return $data->precioConIva(); }
        ),
        
        'cantidad',
        array(
            "name" => "Total",
            "value" => function ($data, $row) { return $data->total(); }
        ),
    ),
)); ?>
