<?php
/* @var $this ReglaValidacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regla Validacions',
);

$this->menu=array(
	array('label'=>'Create ReglaValidacion', 'url'=>array('create')),
	array('label'=>'Manage ReglaValidacion', 'url'=>array('admin')),
);
?>

<h1>Regla Validacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
