<?php
    $bThin = isset($options["thin"]) ? $options["thin"] : false;
    $bButtons = isset($options["buttons"]) ? $options["buttons"] : true;
?>

<div id="desglose-pedido" class="box <?php echo $bThin ? "thin" : ""; ?>">
    <h1>Detalle del pedido</h1>
    
<?php
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
          'buttons'=>array(            
            'delete' => array(
              'label'=>'Borrar linea',
              'click'=>"function(){
                    $.fn.yiiGridView.update('lineas-pedido-grid', { 
                        type:'POST',
                        url:$(this).attr('href'),
                        success:function(data) {
                              $.fn.yiiGridView.update('my-grid'); //change my-grid to your grid's name
                        }
                    })
                    return false;
                }"
            ),
          ),
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