<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear producto', 'url'=>array('create')),
	array('label'=>'Listado de productos', 'url'=>array('admin')),
);
?>
<div class="box thin">
<h1>Actualizar <?php echo $model->nombre; ?> (id: <?php echo $model->id; ?>)</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>