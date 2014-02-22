<?php
/* @var $this TipoIvaController */
/* @var $model TipoIva */

$this->breadcrumbs=array(
	'Tipo Ivas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listado de Tipos de Iva', 'url'=>array('admin')),
);
?>
<div class="box thin">
<h1>Crear Tipo de Iva</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>