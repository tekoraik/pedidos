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

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	

	<div class="row">
        <?php echo $form->labelEx($model,'id_padre'); ?>
        <?php echo $form->dropDownList(
            $model, 
            'id_padre', 
            CHtml::listData(Categoria::model()->findAll(array("condition" => "id_empresa=".Yii::app()->empresa->getModel()->id)), "id", "nombre"),
            array('prompt'=>'Selecciona categoria padre')
        ); ?>
        <?php echo $form->error($model,'id_padre'); ?>
    </div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->