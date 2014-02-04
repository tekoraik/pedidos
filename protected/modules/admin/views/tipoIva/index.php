<?php
/* @var $this TipoIvaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Ivas',
);

$this->menu=array(
	array('label'=>'Create TipoIva', 'url'=>array('create')),
	array('label'=>'Manage TipoIva', 'url'=>array('admin')),
);
?>

<h1>Tipo Ivas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
