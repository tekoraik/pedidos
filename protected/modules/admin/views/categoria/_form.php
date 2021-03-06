<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categoria-form',
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
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>100)); ?>
		<?php $this->widget('application.components.widgets.CopyFieldAsSlug', array(
			"model" => $model,
			"attribute" => "nombre",
			"copy" => "slug"
		)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_padre'); ?>
		<?php echo $form->dropDownList(
    		$model, 
    		'id_padre', 
    		CHtml::listData(Categoria::model()->findAll(), "id", "nombre"),
			array('prompt'=>'Selecciona categoria padre')
		); ?>
		<?php echo $form->error($model,'id_padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_empresa'); ?>
		<?php echo $form->dropDownList(
    		$model, 
    		'id_empresa', 
    		CHtml::listData(Empresa::model()->findAll(), "id", "nombre")
			//array('prompt'=>'Selecciona empresa')
		); ?>
		<?php echo $form->error($model,'id_empresa'); ?>
		
    	
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->