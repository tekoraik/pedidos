<!--Generated using Gimme CRUD freeware from www.HandsOnCoding.net -->

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'client-account-create-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
	
    <div class="row">
        <?php echo $form->labelEx($model,'id_pedido'); ?>
        <?php echo $form->textField($model,'id_pedido'); ?>
        <?php echo $form->error($model,'id_pedido'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'id_producto'); ?>
        <?php echo $form->textField($model,'id_producto'); ?>
        <?php echo $form->error($model,'id_producto'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'orden'); ?>
        <?php echo $form->textField($model,'orden'); ?>
        <?php echo $form->error($model,'orden'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'precio'); ?>
        <?php echo $form->textField($model,'precio'); ?>
        <?php echo $form->error($model,'precio'); ?>
    </div>
	
	
    <div class="row">
        <?php echo $form->labelEx($model,'cantidad'); ?>
        <?php echo $form->textField($model,'cantidad'); ?>
        <?php echo $form->error($model,'cantidad'); ?>
    </div>
	
    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form --> 
