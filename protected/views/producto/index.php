<?php
/* @var $this ProductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Productos',
);

$this->pageTitle = "Productos";
?>

<?php if (isset($categoria) && $categoria): ?>
    <h1><?php echo $categoria->nombre; ?></h1>
<?php else: ?>
    <h1>Nuestros productos</h1>
<?php endif; ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>'{items} {pager}',
	'emptyText' => 'No hay resultados',
	'pager' => array(
        'nextPageLabel' => 'Siguiente',
        'prevPageLabel' => 'Anterior',
        'header' => 'Ir a la página',
    ),
)); ?>
