<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */

$this->breadcrumbs=array(
	'Descriptors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista Descriptores', 'url'=>array('admin')),
	array('label'=>'Crear Descriptor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#descriptor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Descriptores</h1>


<?php /*
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
  */ ?>
 
<div class="box">
<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'descriptor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'tipo',
		'tipo_valor',
		'visible',
		array(
          "name" => 'categoria_nombre',
          "value" => function ($data, $row) {return isset($data->categoria) ? $data->categoria->nombre : ""; },
          'htmlOptions'=>array('width'=>'200px')
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
