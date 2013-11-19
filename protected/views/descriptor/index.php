<?php
/* @var $this DescriptorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Descriptors',
);

$this->menu=array(
	array('label'=>'Create Descriptor', 'url'=>array('create')),
	array('label'=>'Manage Descriptor', 'url'=>array('admin')),
);
?>

<h1>Descriptors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
