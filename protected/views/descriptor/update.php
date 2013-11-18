<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */

$this->breadcrumbs=array(
	'Descriptors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Descriptores', 'url'=>array('admin')),
	array('label'=>'Crear Descriptor', 'url'=>array('create')),
	array('label'=>'Ver Descriptor', 'url'=>array('view', 'id'=>$model->id)),
);
?>
<div class="box thin">
<h1>Actualizar Descriptor <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>