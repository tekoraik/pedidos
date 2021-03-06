<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_padre')); ?>:</b>
	<?php if ($data->padre): ?>
	<?php echo CHtml::encode($data->padre->nombre); ?>
	<?php endif; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::encode($data->empresa->nombre); ?>
	<br />


</div>