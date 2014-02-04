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
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>
<?php Yii::app()->clientScript->registerScript('empresa-form', '
    function rgb2hex(rgb){
     rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
     return "#" +
      ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
      ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
      ("0" + parseInt(rgb[3],10).toString(16)).slice(-2);
    }
    $("#empresa-form").submit(function (oEvent) {
        var sColor, i;
        for (i=1;i<=15;i++) {
            sColor = rgb2hex($("#personalizar-color" + i).css("background-color"));
            $("#Empresa_color" + i).val(sColor);
        }
        return true;
    });
');
?>

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
    <div class="row">
        <p>Personalización del sitio: </p>
        
        <?php $oEmpresa = Yii::app()->empresa->getModel(); for ($i = 1; $i <=15; $i++): ?>
        <?php if ($i==1): ?>
           <p>Colores principales:</p> 
        <?php endif; ?>
        <?php if ($i==6): ?>
           <p>Fondos Menú:</p> 
           
        <?php endif; ?>
        <?php if ($i==8): ?>
           <p>Boton añadir:</p> 
        <?php endif; ?>
        <?php if ($i==12): ?>
           <p>Color de letra de Menú:</p> 
        <?php endif; ?>
         <?php if ($i==14): ?>
           <p>Barra superior:</p> 
        <?php endif; ?>
        <div id="personalizar-color<?php echo $i; ?>" class="color-selector" style="background-color: <?php echo $oEmpresa["color" . $i] ?>;"></div>
        <input type="hidden" id="Empresa_color<?php echo $i; ?>" name="Empresa[color<?php echo $i; ?>]" />
        
        <?php $this->widget('application.extensions.colorpicker.EColorPicker', 
              array(
                    'name'=>'cp'.$i,
                    'mode'=>'selector',
                    'fade' => true,
                    'slide' => false,
                    'curtain' => true,
                    'selector' => 'personalizar-color' . $i,
                    'value' => substr($oEmpresa["color" . $i], 1),
                   )
             ); ?>
         <?php endfor; ?>
        <div class="row">
        <?php echo $form->labelEx($model,'logo'); ?> 
        <?php echo CHtml::activeFileField($model, 'logo'); ?>
        <?php echo $form->error($model,'logo'); ?>
        <?php if($model->isNewRecord!='1' && $model->logo): ?>
        <div class="row">
        <?php echo CHtml::image(Yii::app()->request->baseUrl.'/img/logos/'.$model->logo,"image",array("width"=>255)); ?>
        </div>
        <?php endif; ?>
    </div>
    </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Empresa' : 'Actualizar datos'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->