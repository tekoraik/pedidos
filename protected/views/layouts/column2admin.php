<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/default'); ?>
    <div id="izquierda">
    <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'Operaciones',
            'htmlOptions'=>array('class'=>'box'),
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items'=>$this->menu,
            'htmlOptions'=>array('class'=>''),
        ));
        $this->endWidget();
    ?>
    </div>
	<div id="cuerpo">
		<?php echo $content; ?>
	</div><!-- content -->
<?php $this->endContent(); ?>