<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

?>
<div class="box thin">
<h1>Registro de usuario</h1>
<p>Una vez registrado podrás realizar pedidos para <?php echo Yii::app()->empresa->getModel()->nombre; ?></p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>