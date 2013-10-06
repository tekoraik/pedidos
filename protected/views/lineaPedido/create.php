<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->
<?php
$this->breadcrumbs=array(
	'LineaPedidos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LineaPedidos', 'url'=>array('index')),
    array('label'=>'Manage LineaPedido', 'url'=>array('admin')),
);
?>

<h1>Create LineaPedido</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
