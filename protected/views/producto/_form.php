<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_corta'); ?>
		<?php echo $form->textField($model,'descripcion_corta',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'descripcion_corta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_larga'); ?>
		<?php echo $form->textArea($model,'descripcion_larga',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_larga'); ?>
	</div>
	
	<div class="row">
         <?php echo $form->labelEx($model,'id_tipo_iva'); ?>
        <?php echo $form->dropDownList(
            $model, 
            'id_tipo_iva', 
            CHtml::listData(TipoIva::model()->findAll(array("condition" => "id_empresa=".Yii::app()->empresa->getModel()->id)), "id", "nombre"),
            array('prompt'=>'Selecciona tipo iva')
        ); ?>
        
        <?php echo $form->error($model,'id_categoria'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'imagen'); ?>
        <?php echo CHtml::activeFileField($model, 'imagen'); ?>
        <?php echo $form->error($model,'imagen'); ?>
        <?php if($model->isNewRecord!='1' && $model->imagen): ?>
        <div class="row">
        <?php echo CHtml::image(Yii::app()->request->baseUrl.'/img/productos/'.$model->imagen,"image",array("width"=>255)); ?>
        </div>
        <?php endif; ?>
    </div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

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
    
    <?php $this->widget('application.components.widgets.CamposDescriptores', array('model' => Yii::app()->empresa->getModel(), 'tipo' => 'producto', 'describible' => $model, 'form' => $form)); ?>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->