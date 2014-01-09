<div class="contenedor-imagen">
        <?php if ($data->imagen): ?>
        <img class="imagen" src="<?php echo Yii::app()->getBaseUrl(); ?>/img/productos/<?php echo $data->imagen; ?>" />
        <?php endif; ?>
        <?php if (!$data->imagen): ?>
        <img class="imagen" src="<?php echo Yii::app()->getBaseUrl(); ?>/img/no-disponible.jpg" />
        <?php endif; ?>
</div>