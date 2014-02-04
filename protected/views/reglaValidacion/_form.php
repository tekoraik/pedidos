<?php
/* @var $this ReglaValidacionController */
/* @var $model ReglaValidacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'regla-validacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con<span class="required">*</span> son obligatiorios.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<select id="ReglaValidacion_tipo" name="ReglaValidacion[tipo]">
		    <option value="cadena" <?php echo $model->tipo == "cadena" ? "selected" : ""; ?>>Cadena</option>
		    <option value="rango" <?php echo $model->tipo == "rango" ? "selected" : ""; ?>>Rango</option>
		    <option value="longitud" <?php echo $model->tipo == "longitud" ? "selected" : ""; ?>>Longitud</option>
		    <option value="formula" <?php echo $model->tipo == "formula" ? "selected" : ""; ?>>Formula</option>
		</select>
		<?php echo $form->error($model,'tipo'); ?>
	</div>
	<?php if (!$model->isNewRecord): ?>
    <?php if ($model->tipo != "rango"): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>
    <?php else: ?>
    <div class="row rango">
        <?php echo $form->labelEx($model,'desde'); ?>
        <?php echo $form->textField($model,'desde',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'desde'); ?>
        <?php echo $form->labelEx($model,'hasta'); ?>
        <?php echo $form->textField($model,'hasta',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'hasta'); ?>
    </div>
    <?php endif; ?>
    <?php endif; ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->