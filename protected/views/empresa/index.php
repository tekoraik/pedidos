<?php
/* @var $this EmpresaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
	array('label'=>'Create Empresa', 'url'=>array('create')),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>Empresas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<?php $this->widget(
    'bootstrap.widgets.TbExtendedGridView',
    array(
        'dataProvider' => $dataProvider,
        'type'=>'bordered' ,
        'template' => "{items}",
        'columns' => 	array(
							array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
							array('name'=>'nombre', 'header'=>'Nombre'),
							array(
								'htmlOptions' => array('nowrap'=>'nowrap', 'data-target'=>'#modalCategorias'),
								'class'=>'bootstrap.widgets.TbButtonColumn',
								'viewButtonUrl'=>null,
								'updateButtonUrl'=>null,
								'deleteButtonUrl'=>null,
							)
                        )
        )
); ?>
<!-- View Popup -->
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'modalCategorias')); ?>

<!-- Popup Header --> 
<div class="modal-header">
<h4>Ver detalles de categoria</h4>
</div>

<!-- Popup Content -->
<div class="modal-body">
<p>Detalles de categoria</p>
</div>


<!-- Popup Footer -->
<div class="modal-footer">

<!-- save button -->
<?php $this->widget('bootstrap.widgets.TbButton',  array(
'type'=>'primary',
'label'=>'Guardar' ,
'url'=>'#' ,
'htmlOptions'=>array('data-dismiss'=>'modal') 
)); ?>
<!-- save button end-->

<!-- close button -->
<?php $this->widget('bootstrap.widgets.TbButton',  array(
'label'=>'Cerrar' ,
'url'=>'#' ,
'htmlOptions'=>array('data-dismiss'=>'modal') 
)); ?>
<!-- close button ends-->
</div>
<?php $this->endWidget(); ?>
<!-- View Popup ends -->