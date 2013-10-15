<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listado de categorias', 'url'=>array('admin')),
);
?>
<div class="box thin">
<h1>Crear Categoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>