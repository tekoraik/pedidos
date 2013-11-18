<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl . "/css/default.css"); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<header>
    <div class="menu-principal">
        <?php $this->widget('zii.widgets.CMenu',array(
            'htmlOptions' => array('class' => 'menu'),
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site')),
                array('label'=>'Empresa', 'url'=>array('/admin/empresa')),
                array('label'=>'Productos', 'url'=>array('/admin/producto')),
                array('label'=>'Categorias', 'url'=>array('/admin/categoria')),
                array('label'=>'Permisos', 'url'=>array('/rights')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        )); ?>
    </div><!-- mainmenu -->
</header>
<?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
<?php endif?>

	

	
	<div id="contenido">

	<?php echo $content; ?>
    
    </div>

	<div id="footer">
		
	</div><!-- footer -->


</body>
</html>
