<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Empresa', 'url'=>array('index')),
	array('label'=>'Create Empresa', 'url'=>array('create')),
	array('label'=>'Update Empresa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>View Empresa #<?php echo $model->id; ?></h1>
<?php 
$attributes = array(
        'id',
        'nombre',
        'host',
        
        'slug',
);
if ($model->id_usuario_administrador) {
    $attributes[] = array(
            'label'=>'Usuario administrador',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->administrador->email),
                                 array('emprea/view','id'=>$model->administrador->id)),
        );
    
}
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=> $attributes,
)); ?>
