<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'LineaPedidos',
);

$this->menu=array(
	array('label'=>'Create LineaPedido', 'url'=>array('create')),
	array('label'=>'Manage LineaPedido', 'url'=>array('admin')),
);
?>

<h1>LineaPedidos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
