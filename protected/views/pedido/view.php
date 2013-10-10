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
<div id="desglose-pedido" class="box">
    <h1>Detalle del pedido</h1>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id'=>'lineas-pedido-grid',
    'template' => "{items}{extendedSummary}",
    'enableSorting' => false,
    'htmlOptions' => array('class' => 'grid-view'),
    'dataProvider'=>new CActiveDataProvider('LineaPedido', array('data' => $model->lineas)),
    'columns'=>array(
        'producto.nombre',
        array(
            "name" => "Precio sin iva",
            "value" => function ($data, $row) { return money_format('%#10.2n',$data->precioSinIva()) . " €"; },
            "footer" => $model->totalSinIva()
        ),
        array(
            "name" => "Precio con iva",
            "value" => function ($data, $row) { return money_format('%#10.2n', $data->precioConIva()). " €"; },
            "footer" => $model->totalConIva()
        ),
        
        'cantidad',
        array(
            "name" => "Total sin iva",
            "value" => function ($data, $row) { return money_format('%#10.2n', $data->totalSinIva()) . " €"; },
                     
        ),
        array(
            "name" => "Total con iva",
            "value" => function ($data, $row) { return money_format('%#10.2n', $data->totalConIva()) . " €"; },
                     
        ),
        array(
          'class'=>'bootstrap.widgets.TbButtonColumn',
          'htmlOptions'=>array('style'=>'width: 50px'),
          'template'=>'{delete}', //Only shows Delete button
          'buttons'=>array(            
            'delete' => array(
              'label'=>'Borrar linea',
              'click'=>"function(){
                    $.fn.yiiGridView.update('lineas-pedido-grid', { 
                        type:'POST',
                        url:$(this).attr('href'),
                        success:function(data) {
                              $.fn.yiiGridView.update('my-grid'); //change my-grid to your grid's name
                        }
                    })
                    return false;
                }"
            ),
          ),
          'deleteConfirmation'=>'Está seguro que desea borrar la linea seleccionada?',
          'deleteButtonUrl'=>'$this->grid->owner->createUrl("lineaPedido/delete", $data->primaryKey)'
        ),
    ),
    'extendedSummary' => array(
      'title' => '',       
      'columns' => array(
          'Total sin iva' => array(
            'class' => 'TbSumOperation',
            'label' => 'Total sin iva',
          ),
          'Total con iva' => array(
            'class' => 'TbSumOperation',
            'label' => 'Total del pedido',
          ),
          
      )
 ),
)); ?>
<div class="row buttons" style="text-align: center;">
<a class="button" href="<?php echo $this->createUrl("pedido/realizar", array("id" => $model->id)); ?>">Realizar pedido</a>
</div>
</div>
