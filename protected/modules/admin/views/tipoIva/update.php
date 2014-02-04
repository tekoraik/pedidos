<?php
/* @var $this TipoIvaController */
/* @var $model TipoIva */

$this->breadcrumbs=array(
	'Tipo Ivas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoIva', 'url'=>array('index')),
	array('label'=>'Create TipoIva', 'url'=>array('create')),
	array('label'=>'View TipoIva', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoIva', 'url'=>array('admin')),
);
?>

<h1>Update TipoIva <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>