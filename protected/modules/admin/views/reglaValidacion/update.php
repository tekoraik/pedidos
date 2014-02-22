<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */

$this->breadcrumbs=array(
	'Regla Validacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReglaValidacion', 'url'=>array('index')),
	array('label'=>'Create ReglaValidacion', 'url'=>array('create')),
	array('label'=>'View ReglaValidacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReglaValidacion', 'url'=>array('admin')),
);
?>

<h1>Update ReglaValidacion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>