<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear Categoria', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categoria-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Categorias</h1>


<?php /*
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

 */?>
<div class="box">
<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
	'id'=>'categoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template' => "{items}{pager}",
	'columns'=>array(
		array(
          "name" => 'id',
          'htmlOptions'=>array('width'=>'40px')
        ),
		'nombre',
		array(
          "name" => 'padre_nombre',
          "value" => function ($data, $row) {return isset($data->padre) ? $data->padre->nombre : ""; },
          'htmlOptions'=>array('width'=>'200px')
        ),
		
		array(
            'class'=>'CButtonColumn',
            'htmlOptions'=>array('width'=>'100px')
        ),
	),
)); ?>
</div>
