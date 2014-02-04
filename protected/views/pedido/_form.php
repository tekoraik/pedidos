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

	

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <label>Cliente: </label>
        <p><?php echo ucfirst($model->getNombreCliente()); ?></p>
    </div>
    
    
    <div class="row">
        <?php echo $form->labelEx($model,'id_tipo_estado'); ?>
        <?php echo $form->dropDownList(
            $model, 
            'id_tipo_estado', 
            CHtml::listData(TipoEstadoPedido::model()->findAll(array("condition" => "id_empresa=".Yii::app()->empresa->getModel()->id)), "id", "nombre"),
            array('prompt'=>'Selecciona estado')
        ); ?>
        
        <?php echo $form->error($model,'id_categoria'); ?>
    </div>
    
	<div class="row">
        <label>Fecha realizado: </label>
        <p><?php echo $model->fecha_realizado; ?></p>
    </div>

    <div class="row">
        <label>Total sin iva: </label>
        <p><?php echo number_format($model->totalSinIva(), 2); ?> €</p>
    </div>
    
	

    <div class="row">
        <label>Total con iva: </label>
        <p><?php echo number_format($model->totalConIva(), 2); ?> €</p>
    </div>
    <?php $this->widget('application.components.widgets.CamposDescriptores', array('model' => Yii::app()->empresa->getModel(), 'tipo' => 'pedido', 'describible' => $model, 'form' => $form)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
    
<?php $this->endWidget(); ?>


</div><!-- form -->