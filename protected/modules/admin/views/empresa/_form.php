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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'host'); ?>
        <?php echo $form->textField($model,'host',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'host'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>45,'maxlength'=>45)); ?>
		<?php $this->widget('application.components.widgets.CopyFieldAsSlug', array(
			"model" => $model,
			"attribute" => "nombre",
			"copy" => "slug"
		)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_usuario_administrador'); ?>
        <?php echo $form->dropDownList(
            $model, 
            'id_usuario_administrador', 
            CHtml::listData(Usuario::model()->findAll(), "id", "email"),
            array('prompt'=>'Selecciona usuario administrador')
        ); ?>
        
        <?php echo $form->error($model,'id_usuario_administrador'); ?>
    </div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->