<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Nuevo Producto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#producto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de productos</h1>


<?php /*
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/
?>
<div class="box">
<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template' => "{items}{pager}",
	'columns'=>array(
		array(
		  "name" => 'id',
		  'htmlOptions'=>array('width'=>'40px')
		),
		"nombre",
		array(
          "name" => 'categoria_nombre',
          "value" => function ($data, $row) {return isset($data->categoria) ? $data->categoria->nombre : ""; },
          'htmlOptions'=>array('width'=>'200px')
        ),
        array(
          "name" => 'tipo_iva_nombre',
          "value" => function ($data, $row) {return isset($data->tipoIva) ? $data->tipoIva->nombre : ""; },
          'htmlOptions'=>array('width'=>'200px')
        ),
		/*array(
		  "name" => "descripcion_corta",
		  "value" => function ($data, $row) {
		      $sSuffix = strlen($data['descripcion_corta']) > 40 ? " ..." : "";
		      return substr($data['descripcion_corta'], 0, 40). $sSuffix;
		  }
        ),
		array(
          "name" => "descripcion_larga",
          "value" => function ($data, $row) {
              $sSuffix = strlen($data['descripcion_larga']) > 40 ? " ..." : "";
              return substr($data['descripcion_larga'], 0, 40) . $sSuffix;
          }
        ),*/
		array(
          "name" => 'precio',
          'htmlOptions'=>array('width'=>'80px')
        ),
		/*
		'id_empresa',
		'id_categoria',
		*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'100px')
		),
	),
)); ?>
</div>