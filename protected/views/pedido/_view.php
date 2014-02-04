<?php
/* @var $this PedidoController */
/* @var $data Pedido */
?>

<div class="view box">
    <?php $nTimeRealizado = strtotime($data->fecha_realizado); ?>
    <p class="info-lista-pedidos">Pedido realizado el día: <?php echo Yii::app()->dateFormatter->formatDateTime($nTimeRealizado, "long"); ?></p>
    <p class="estado-lista-pedidos <?php echo $data->getNombreEstado(); ?>"><?php echo $data->getNombreEstado(); ?></p>
    <ul class="lista-productos">
        <?php foreach ($data->lineas as $oLinea): ?>
        <li>
            <img width="78" height="78" src="<?php echo Yii::app()->getBaseUrl(); ?>/<?php echo $oLinea->producto->getImagePath(); ?>" />
            
            <p>
                <?php echo $oLinea->cantidad; ?>
            </p>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php if ($data->fecha_inicio): ?>
    <p><strong>Fecha de inicio de preparación:</strong> <?php echo Yii::app()->dateFormatter->formatDateTime(strtotime($data->fecha_inicio), "long"); ?></p>
    <?php endif; ?>
    <?php if ($data->fecha_finalizado): ?>
    <p><strong>Fecha de finalización: </strong><?php echo Yii::app()->dateFormatter->formatDateTime(strtotime($data->fecha_finalizado), "long"); ?></p>
    <?php endif; ?>
</div>