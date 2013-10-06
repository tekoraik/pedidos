<?php
/* @var $this ProductoController */
/* @var $data Producto */
?>

<div class="producto view box">
    
    <div class="contenedor-imagen">
        <?php if ($data->imagen): ?>
        <img class="imagen" src="<?php echo Yii::app()->getBaseUrl(); ?>/img/productos/<?php echo $data->imagen; ?>" />
        <?php endif; ?>
        <?php if (!$data->imagen): ?>
        <img class="imagen" src="<?php echo Yii::app()->getBaseUrl(); ?>/img/no-disponible.jpg" />
        <?php endif; ?>
    </div>
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
        <a class="button pedir">
            Añadir al pedido
        </a>
    </div>
	

	


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	*/ ?>

</div>