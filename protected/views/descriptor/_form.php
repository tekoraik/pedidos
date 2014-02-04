<?php
/* @var $this DescriptorController */
/* @var $model Descriptor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'descriptor-form',
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
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php // echo $form->textField($model,'tipo',array('size'=>45,'maxlength'=>45)); ?>
		<select name="Descriptor[tipo]">
		    <option <?php echo $model->tipo == 'producto' ? "selected" : ""; ?>value="producto">Producto</option>
		    <option <?php echo $model->tipo == 'pedido' ? "selected" : ""; ?> value="pedido">Pedido</option>
		</select>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_valor'); ?>
		<?php //echo $form->textField($model,'tipo_valor',array('size'=>7,'maxlength'=>7)); ?>
		<select name="Descriptor[tipo_valor]">
            <option <?php echo $model->tipo_valor == 'cadena' ? "selected" : ""; ?> value="cadena">Cadena</option>
            <option <?php echo $model->tipo_valor == 'entero' ? "selected" : ""; ?> value="entero">Entero</option>
            <option <?php echo $model->tipo_valor == 'decimal' ? "selected" : ""; ?> value="decimal">Decimal</option>
            <option <?php echo $model->tipo_valor == 'fecha' ? "selected" : ""; ?> value="fecha">Fecha</option>
            <option <?php echo $model->tipo_valor == 'formula' ? "selected" : ""; ?> value="formula">Formula</option>
        </select>
		<?php echo $form->error($model,'tipo_valor'); ?>
	</div>
	
    <?php if (!$model->isNewRecord && $model->tipo == 'producto'): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id_categoria'); ?>
		<?php echo $form->dropDownList(
            $model, 
            'id_categoria', 
            CHtml::listData(Categoria::model()->findAll(array("condition" => "id_empresa=".Yii::app()->empresa->getModel()->id)), "id", "nombre"),
            array('prompt'=>'Selecciona categoria')
        ); ?>
		<?php echo $form->error($model,'id_categoria'); ?>
	</div>

	<?php endif; ?>
	<?php if ($model->tipo_valor == "formula"): ?>
	    <div class="row">
        <?php echo $form->labelEx($model,'formula'); ?>
        <?php echo $form->textField($model,'formula',array('size'=>45,'maxlength'=>45)); ?>
        <?php echo $form->error($model,'formula'); ?>
    </div>
    <?php endif; ?>
    <div class="row">
        <?php echo $form->labelEx($model,'visible'); ?>
        <?php echo $form->dropDownList(
            $model, 
            'visible', 
            array('1' => "Si", '0' => 'No')
        ); ?>
        
        <?php echo $form->error($model,'id_categoria'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'id_regla_validacion'); ?>
        <?php echo $form->dropDownList(
            $model, 
            'id_regla_validacion', 
            CHtml::listData(ReglaValidacion::model()->findAll(array("condition" => "id_empresa=".Yii::app()->empresa->getModel()->id)), "id", "nombre"),
            array('prompt'=>'Selecciona regla de validacion')
        ); ?>
        
        <?php echo $form->error($model,'id_categoria'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->