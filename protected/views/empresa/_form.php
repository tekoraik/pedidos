<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'host'); ?>
        <p>Recuerda que debes configurar tus DNS para poder acceder correctamente <a href="#">(+info)</a></p>
        <?php echo $form->textField($model,'host',array('size'=>50,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'host'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Empresa' : 'Actualizar datos'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->