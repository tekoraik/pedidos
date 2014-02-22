<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id,
);


?>
<div class="box detalle-producto">
<header>
<h1><?php echo $model->nombre; ?></h1>
</header>
<?php echo $this->renderPartial('_imagen', array('data' => $model)); ?>
<div class="info">
    <table>
        <tbody>
            <tr>
                <td>Precio:</td>
                <td><?php echo $model["FormattedPrecio"]; ?></td>
            </tr>
            <tr>
                <td>IVA:</td>
                <td><?php echo $model["FormattedIva"]; ?></td>
            </tr>
            <tr class="precio-total">
                <td>Precio total:</td>
                <td><?php echo $model["FormattedTotal"]; ?></td>
            </tr>
        </tbody>
    </table>
    <?php echo $this->renderPartial('_boton_add', array('data' => $model)); ?>
</div>
<div class="detail">
    <h2>Descripción</h2>
    <p><?php echo $model["descripcion_larga"] ? $model["descripcion_larga"] : $model["descripcion_corta"]; ?></p>
    <?php $aCamposAdicionales = $model->getNombresCampos(true, true); ?>
    <?php if (count($aCamposAdicionales)): ?>
    <h3>Información adicional</h3>
    
    <?php foreach ($aCamposAdicionales as $sNombre): ?>
    <p class="field-label">
        <?php echo $sNombre; ?>
    </p>
    
    <p class="field-value">
        <?php $sValor = $model->getValor($sNombre); ?>
        <?php echo $sValor ? $sValor : "[Sin valor]" ?>
    </p>
    <?php endforeach; ?> 
    <?php endif; ?>
</div>

</div>
