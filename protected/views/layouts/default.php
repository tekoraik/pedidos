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
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/main.js'); ?>
    </head>

    <body>
            
            <header>
              <!--<img src="<?php echo Yii::app()->getBaseUrl(); ?>/img/logo.png" width="200" style="float: left;" />-->
              <?php if (Yii::app()->user->getId()!==null): ?>
              <span><a href="<?php echo $this->createUrl('site/logout'); ?>">Logout</a></span>
              <?php else: ?>
              <span><a href="<?php echo $this->createUrl('site/login'); ?>">Login</a></span>
              <span>| <a href="<?php echo $this->createUrl('usuario/create'); ?>">Registrarse</a></span>
              <?php endif; ?>
              <?php if ($this->checkRole("Admin")): ?>
                  <span>| <a href="<?php echo $this->createUrl('/admin'); ?>">Admin</a></span>
              <?php endif; ?>
              <div class="menu-principal">
                <nav>
                   <?php
                    $aExtraItems = array(array());
                    if ($this->checkRole("AdminEmpresa")) {
                        $aExtraItems = array(array(
                                 "url" => "",
                                 "label" => "Administrar",
                                 array(
                                    "url" => array( "route" => "producto/admin"),
                                    "label" => "Gestión de productos"
                                 ),
                                 array(
                                    "url" => array( "route" => "categoria/admin"),
                                    "label" => "Gestión de categorias"
                                 ),
                                 
                                 array(
                                    "url" => array( "route" => "pedido/admin"),
                                    "label" => "Gestión de pedidos"
                                 ),
                                 array(
                                    "url" => array( "route" => "tipoEstadoPedido/admin"),
                                    "label" => "Estados de pedido"
                                 ),
                                 array(
                                    "url" => array( "route" => "empresa/update?id=".Yii::app()->empresa->getModel()->id),
                                    "label" => "Empresa"
                                 ),
                                 array(
                                    "url" => array( "route" => "descriptor/admin"),
                                    "label" => "Descriptores"
                                 ),
                                 array(
                                    "url" => array( "route" => "reglaValidacion/admin"),
                                    "label" => "Reglas de validación"
                                 ),
                            ));
                    }
                    $this->widget('application.extensions.menu.SMenu',
                    array("menu" =>
                        array_merge(
                            Yii::app()->categoria->getMenu(Yii::app()->empresa->getModel()->categorias),
                            $aExtraItems
                        )
                            ,
                        "menuID"=>"menuprincipal",
                        "delay"=>3
                        )
                    );
                    
                    ?>
                    
                </nav>
            </div>
                
            
            </header>
            
            <div id="contenido">
                    <?php $this->widget('application.components.widgets.Flashes'); ?>
                    <?php echo $content; ?>
            </div>
            <footer>
                
            </footer>
        </div>
    </body>
</html>