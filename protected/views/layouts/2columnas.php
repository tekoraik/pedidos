<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/default'); ?>
<div id="izquierda">
                <div id="widget-pedido" class="box">
                    <h1>Tu pedido</h1>
                    <img src="<?php echo Yii::app()->getBaseUrl(); ?>/img/carrito.png" width="160" height="157" alt="" />
                    <?php if (count(Yii::app()->pedido->getModel()->lineas) > 0): ?>
                    <p class="precio">
                        <?php echo number_format(Yii::app()->pedido->getModel()->totalConIva(), 2); ?> €
                    </p>
                    <p>Productos: <?php echo Yii::app()->pedido->getModel()->numeroLineas(); ?></p>
                    <p>
                    <a class="button" href="<?php echo $this->createUrl("pedido/verPedidoActual"); ?>">Ver pedido</a>
                    </p>
                    <?php else: ?>
                        <p class="msg">Todavia no hay productos en el pedido</p>
                    <?php endif; ?>
                    
                </div>
</div>
<div id="cuerpo">
    <?php echo $content; ?>
</div><!-- content -->

<?php $this->endContent(); ?>