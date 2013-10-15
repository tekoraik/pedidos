<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear Categoria', 'url'=>array('create')),
	array('label'=>'Modificar Categoria', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Categoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado Categorias', 'url'=>array('admin')),
);
?>

<div class="box">
<h1>Detalle de Categoria</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'slug',
		'id_padre',
		'id_empresa',
	),
)); ?>
</div>
