<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear producto', 'url'=>array('create')),
	array('label'=>'Actualizar producto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado de productos', 'url'=>array('admin')),
);
?>
<div class="box">
<h1>Detalle del producto</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'slug',
		'descripcion_corta',
		'descripcion_larga',
		'precio',
		'id_empresa',
		'id_categoria',
	),
)); ?>
</div>
