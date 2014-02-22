<?php
/* @var $this PedidoController */
/* @var $model Pedido */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listado de Pedidos', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pedido-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="box">
<h1>Gestión de Pedidos</h1>


<?php /*
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
 
 */
?>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'pedido-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template' => "{items}{pager}",
	
	'columns'=>array(
		array(
          "name" => 'id',
          'htmlOptions'=>array('width'=>'40px')
        ),
        array(
          "header" => "Pedido por",
          "value" => '$data->usuario->nombre',
          'htmlOptions'=>array('width'=>'200px'),
        ),
        array(
          "name" => 'nombreEstado',
          "value" => function ($data, $row) {return $data->getNombreEstado(); },
          'htmlOptions'=>array('width'=>'200px')
        ),
        array(
          "header" => 'fecha_realizado',
          "value" => '$data->getFechaRealizado()',
          'htmlOptions'=>array('width'=>'170px')
        ),
        array(
          "header" => 'fecha_inicio',
          "value" => '$data->getFechaInicio()',
          'htmlOptions'=>array('width'=>'170px')
        ),
        array(
          "header" => 'fecha_finalizado',
          "value" => '$data->getFechaFinalizado()',
          'htmlOptions'=>array('width'=>'170px')
        ),
		array(
          "header" => "T.sin iva",
          "value" => 'number_format($data->totalSinIva() ,2)."€"',
          'htmlOptions'=>array('width'=>'200px'),
        ),
		
		array(
          "header" => "T.con iva",
          "value" => 'number_format($data->totalConIva() ,2)."€"',
          'htmlOptions'=>array('width'=>'200px'),
        ),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width: 300px'),
		),
	),
)); ?>
</div>