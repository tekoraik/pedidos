<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear Categoria', 'url'=>array('create')),
	array('label'=>'Ver categoria', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Lista de categorias', 'url'=>array('admin')),
);
?>
<div class="box thin">
<h1>Actualizar Categoria <?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>