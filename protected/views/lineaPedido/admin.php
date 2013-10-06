<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'LineaPedidos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LineaPedidos', 'url'=>array('index')),
	array('label'=>'Create LineaPedido', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lineaPedidogrid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage LineaPedidos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'lineaPedidogrid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id_pedido',
        'id_producto',
        'orden',
        'precio',
        'cantidad',
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("lineaPedido/view/", 
                                            array("id_pedido"=>$data->id_pedido, "id_producto"=>$data->id_producto
											))',
                ),
                'update' => array
                (
                    'url'=>
                    'Yii::app()->createUrl("lineaPedido/update/", 
                                            array("id_pedido"=>$data->id_pedido, "id_producto"=>$data->id_producto
											))',
                ),
                'delete'=> array
                (
                    'url'=>
                    'Yii::app()->createUrl("lineaPedido/delete/", 
                                            array("id_pedido"=>$data->id_pedido, "id_producto"=>$data->id_producto
											))',
                ),
            ),
        ),
    ),
)); ?>
