<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */

$this->breadcrumbs=array(
	'Regla Validacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Reglas de Validación', 'url'=>array('admin')),
	array('label'=>'Crear Regla de Validación', 'url'=>array('create')),
	array('label'=>'Ver Regla de Validación', 'url'=>array('view', 'id'=>$model->id)),
);
?>
<div class="box thin">
<h1>Actualizar Regla de Validación <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>