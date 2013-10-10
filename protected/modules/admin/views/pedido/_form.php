<?php
/* @var $this PedidoController */
/* @var $model Pedido */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pedido-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'realizado'); ?>
		<?php echo $form->textField($model,'realizado'); ?>
		<?php echo $form->error($model,'realizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_realizado'); ?>
		<?php echo $form->textField($model,'fecha_realizado'); ?>
		<?php echo $form->error($model,'fecha_realizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_persona'); ?>
		<?php echo $form->textField($model,'id_persona'); ?>
		<?php echo $form->error($model,'id_persona'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iva'); ?>
		<?php echo $form->textField($model,'iva',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'iva'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->