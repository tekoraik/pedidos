<?php
/* @var $this ProductoController */
/* @var $data Producto */
?>

<div class="producto view box">
    
    <?php echo $this->renderPartial('_imagen', array('data' => $data)); ?>
    <div class="nombre">
        <p><?php echo CHtml::encode($data->nombre); ?></p>
    </div>
    <div class="precio">
        <?php echo CHtml::encode($data->precio); ?> €
    </div>
    <div class="descripcion-corta">
        <?php echo CHtml::encode($data->descripcion_corta); ?>
    </div>
    
    <div class="leyenda">
        <p class="detalle">
            <?php echo CHtml::link(CHtml::encode("Ver detalle"), array('view', 'id'=>$data->id)); ?>
        </p>
        <?php echo $this->renderPartial('_boton_add', array('data' => $data)); ?>
    </div>
	

	


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	*/ ?>

</div>