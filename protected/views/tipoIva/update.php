<?php
/* @var $this TipoIvaController */
/* @var $model TipoIva */

$this->breadcrumbs=array(
	'Tipo Ivas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listado Tipos de Iva', 'url'=>array('admin')),
	array('label'=>'Crear Tipo de Iva', 'url'=>array('create')),
);
?>

<div class="box thin">
<h1>Actualizar Tipo de Iva (<?php echo $model->id; ?>)</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>