<?php
    $bThin = isset($options["thin"]) ? $options["thin"] : false;
    $bButtons = isset($options["buttons"]) ? $options["buttons"] : true;
?>

<div id="desglose-pedido" class="box <?php echo $bThin ? "thin" : ""; ?>">
    <h1>Detalle del pedido</h1>
    
<?php
    Yii::app()->clientScript->registerScript("plus-minus", "
        function reloadPedido() {
            $.get(window.location.href, function (oData) {
                $('#widget-pedido').html($(oData).find('#widget-pedido').html());
            });
        }
        function plusEvent(oEvent) {
                 var id = oEvent.target.parentNode.parentNode.className.replace('producto_',''),
                 baseUrl = $(\"meta[name='baseUrl']\").attr('content'),
                 nInc = $(oEvent.target).hasClass('plus') ? 1 : -1;
                 if (!isNaN(id)) {
                    $.ajax({
                        url: baseUrl + '/pedido/incCantidad?id_producto=' + id + '&inc=' + nInc,
                        type: 'get',
                        success: function () {
                            $.fn.yiiGridView.update('lineas-pedido-grid'); 
                            reloadPedido();
                        }
                    });
                    
                 }
                 return false; 
        }
        
    ");
    $aColumns = array(
        'producto.nombre',
        array(
            "name" => "Precio sin iva",
            "value" => function ($data, $row) { return money_format('%#10.2n',$data->precioSinIva()) . " €"; },
        ),
        array(
            "name" => "Precio con iva",
            "value" => function ($data, $row) { return money_format('%#10.2n', $data->precioConIva()). " €"; },
        ),
        'cantidad',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template'=>'{minus}{plus}',
            'htmlOptions'=>array('width'=>'10px'),
            'buttons' => array(
                'plus' => array
                    (
                        'label'=>'+',     //Text label of the button.
                        'url'=>'"#"',       //A PHP expression for generating the URL of the button.
                        'options' => array('class' => 'plus'),
                        'click' => 'plusEvent'
                    ),
                'minus' => array
                    (
                        'label'=>'-',     //Text label of the button.
                        'url'=>'"#"',       //A PHP expression for generating the URL of the button.
                        'options' => array('class' => 'minus'),
                        'click' => 'plusEvent'
                    )
            ),
        ),
        array(
            "name" => "Total sin iva",
            "value" => function ($data, $row) { return money_format('%#10.2n', $data->totalSinIva()) . " €"; },
                     
        ),
        array(
            "name" => "Total con iva",
            "value" => function ($data, $row) { return money_format('%#10.2n', $data->totalConIva()) . " €"; },
                     
        ),
        
    );
if ($bButtons)
$aColumns[] = array(
          'class'=>'bootstrap.widgets.TbButtonColumn',
          'htmlOptions'=>array('style'=>'width: 50px'),
          'template'=>'{delete}', //Only shows Delete button
         
          'deleteConfirmation'=>'Está seguro que desea borrar la linea seleccionada?',
          'deleteButtonUrl'=>'$this->grid->owner->createUrl("lineaPedido/delete", $data->primaryKey)'
        );
?>
<?php $this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'id'=>'lineas-pedido-grid',
    'template' => "{items}{extendedSummary}",
    'enableSorting' => false,
    'htmlOptions' => array('class' => 'grid-view'),
    'dataProvider'=>new CActiveDataProvider('LineaPedido', array('data' => $model->lineas)),
    'columns'=>$aColumns,
    'rowCssClassExpression' => '"producto_{$data->id_producto}"',
    'extendedSummary' => array(
      'title' => '',       
      'columns' => array(
          'Total sin iva' => array(
            'class' => 'TbSumOperation',
            'label' => 'Total sin iva',
          ),
          'Total con iva' => array(
            'class' => 'TbSumOperation',
            'label' => 'Total del pedido',
          ),
          
      )
 ),
)); ?>
