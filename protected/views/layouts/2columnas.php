<!DOCTYPE html>
<html lang="es">
    <head>
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <meta name="language" content="es" />
    
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
        
        <meta charset="utf-8" />


        <meta name="description" content="" />
        <meta name="author" content="Luis" />

        <meta name="viewport" content="width=device-width; initial-scale=1.0" />

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    </head>

    <body>
            
            <header>
              <!--<img src="<?php echo Yii::app()->getBaseUrl(); ?>/img/logo.png" width="200" style="float: left;" />-->
             
              <div class="menu-principal">
                <nav>
                   <?php
                
                    $this->widget('application.extensions.menu.SMenu',
                    array("menu" =>Yii::app()->categoria->getMenu(Yii::app()->empresa->getModel()->categorias),
                        "menuID"=>"menucategorias",
                        "delay"=>3
                        )
                    );
                    
                    ?>
                    
                </nav>
                </div>
                
            
            </header>
            
            <div id="contenido">
            
            <div id="izquierda">
                
            </div>
            <div id="cuerpo">
                <header>
                    <!--<h1><?php echo $this->pageTitle; ?></h1>-->
                </header>
                    <?php echo $content; ?>
            </div>

            <footer>
                
            </footer>
        </div>
    </body>
</html>