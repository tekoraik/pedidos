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
        <?php Yii::app()->clientScript->registerCss('personalizacion-empresa', '
            body {
                background: '.Yii::app()->empresa->getModel()->color1.';
                color: '.Yii::app()->empresa->getModel()->color2.';
            }
            a {
                color: '.Yii::app()->empresa->getModel()->color3.';
            }
            
            .box {
               background: '.Yii::app()->empresa->getModel()->color4.';
                
            }
            .precio {
                color: '.Yii::app()->empresa->getModel()->color5.' !important;
            }
            
            .button.pedir {
                background: -webkit-gradient( linear, left top, left bottom, color-stop(0.05, '.Yii::app()->empresa->getModel()->color9.'), color-stop(1, '.Yii::app()->empresa->getModel()->color8.') );
                background: -moz-linear-gradient( center top, '.Yii::app()->empresa->getModel()->color9.' 5%, '.Yii::app()->empresa->getModel()->color8.' 100% );
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=\''.Yii::app()->empresa->getModel()->color9.'\', endColorstr=\''.Yii::app()->empresa->getModel()->color8.'\');
                background-color: '.Yii::app()->empresa->getModel()->color9.';
                border: 1px solid '.Yii::app()->empresa->getModel()->color8.';
                box-shadow: inset 0px 1px 0px 0px '.Yii::app()->empresa->getModel()->color11.';
                text-shadow: 1px 1px 0px '.Yii::app()->empresa->getModel()->color8.';
            }
            .button.pedir:hover {
                background: '.Yii::app()->empresa->getModel()->color9.';
            }
            .button:hover {   
                text-decoration: none;
                color: '.Yii::app()->empresa->getModel()->color2.';
            }

            #menuprincipal, #menuprincipal li {
                background: '.Yii::app()->empresa->getModel()->color6.'; 
                color: '.Yii::app()->empresa->getModel()->color12.';
            }

            #menuprincipal li:hover {
                color: '.Yii::app()->empresa->getModel()->color13.';
                background: '.Yii::app()->empresa->getModel()->color7.';
            }
            #menuprincipal li > ul > li:hover > a {
                color: '.Yii::app()->empresa->getModel()->color13.';
            }
            #menuprincipal .menulink {
                color: '.Yii::app()->empresa->getModel()->color12.';
            }
            #menuprincipal .menulink.menuhover {
                color: '.Yii::app()->empresa->getModel()->color13.';
            }
            #tool-bar {
                background: '.Yii::app()->empresa->getModel()->color6.';
                background: -moz-linear-gradient(top, '.Yii::app()->empresa->getModel()->color6.' 0%, '.Yii::app()->empresa->getModel()->color1.' 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.Yii::app()->empresa->getModel()->color6.'), color-stop(100%,'.Yii::app()->empresa->getModel()->color1.'));
                background: -webkit-linear-gradient(top, #'.Yii::app()->empresa->getModel()->color6.' 0%,'.Yii::app()->empresa->getModel()->color1.'100%);
                background: -o-linear-gradient(top, '.Yii::app()->empresa->getModel()->color6.'0%,'.Yii::app()->empresa->getModel()->color1.' 100%);
                background: -ms-linear-gradient(top, '.Yii::app()->empresa->getModel()->color6.' 0%,'.Yii::app()->empresa->getModel()->color1.' 100%);
                background: linear-gradient(to bottom, '.Yii::app()->empresa->getModel()->color6.' 0%,'.Yii::app()->empresa->getModel()->color1.' 100%);
            }
            #top-bar {
                background: '.Yii::app()->empresa->getModel()->color14.';
                color: '.Yii::app()->empresa->getModel()->color15.';
            }
            #top-bar a { color: inherit; }
            ul.menu ul ul {
                left: '.Yii::app()->categoria->getWidthItem(Yii::app()->empresa->getModel()->categorias, $this->checkRole("AdminEmpresa") ? 1 : 0) . 'px;
            }
            #search label {
                color: '.Yii::app()->empresa->getModel()->color15.';
            }
        '); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <meta charset="utf-8" />


        <meta name="description" content="" />
        <meta name="author" content="Luis" />
        <meta name="baseUrl" content="<?php echo Yii::app()->getBaseUrl(); ?>" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/main.js'); ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-47783529-1', 'livetin.com');
          ga('send', 'pageview');
        
        </script>
    </head>

    <body>
            
            <header>
              
              <div id="top-bar">
              <?php if (Yii::app()->empresa->getModel()->logo): ?>
              <div id="logo-empresa">
                      
                      <img height="140" src="<?php echo Yii::app()->getBaseUrl(); ?>/img/logos/<?php echo Yii::app()->empresa->getModel()->logo; ?>" />
                      
              </div>
              <?php endif; ?>
              <div id="top-links">
              <span><a href="<?php echo $this->createUrl('site/index'); ?>">Inicio</a></span>
              <!--<img src="<?php echo Yii::app()->getBaseUrl(); ?>/img/logo.png" width="200" style="float: left;" />-->
               <span>| <a href="<?php echo $this->createUrl('site/contact'); ?>">Contacto</a></span>
              <?php if (Yii::app()->user->getId()!==null): ?>
              <span>| <a href="<?php echo $this->createUrl('pedido/index'); ?>">Mis pedidos</a></span>
              <span>| (<?php echo Usuario::model()->findByPk(Yii::app()->user->getId())->email; ?>) <a href="<?php echo $this->createUrl('site/logout'); ?>">Logout</a></span>
              <?php else: ?>
              <span>| <a href="<?php echo $this->createUrl('site/login'); ?>">Login</a></span>
              <span>| <a href="<?php echo $this->createUrl('usuario/create'); ?>">Registrarse</a></span>
              
              <?php endif; ?>
             
              <?php if ($this->checkRole("Admin")): ?>
                  <span>| <a href="<?php echo $this->createUrl('/admin'); ?>">Admin</a></span>
              <?php endif; ?>
              </div>
              <form id="search" action="<?php echo $this->createUrl("search"); ?>">
                    <label>Buscar productos: </label>
                    <input type="text" name="buscar-criterio" id="buscar-criterio" value="<?php echo $this->buscarCriterio; ?>"/>
                    <button class="button" type="submit">Buscar</button>
                </form>
              </div>
              <div class="menu-principal">
                <nav>
                    
                   <?php
                    $aExtraItems = array(array());
                    $htmlOptions = array("style" => "width: " . Yii::app()->categoria->getWidthItem(Yii::app()->empresa->getModel()->categorias, $this->checkRole("AdminEmpresa") ? 1 : 0) . "px;");
                    if ($this->checkRole("AdminEmpresa")) {
                        $aExtraItems = array(array(
                                 "url" => array( "htmlOptions" => $htmlOptions),
                                 "label" => "Administrar",
                                 
                                 array(
                                    "url" => array( "route" => "producto/admin", "htmlOptions" => $htmlOptions,),
                                    "label" => "Productos",
                                 ),
                                 array(
                                    "url" => array( "route" => "categoria/admin", "htmlOptions" => $htmlOptions,),
                                    "label" => "Categorías",
                                 ),
                                 
                                 array(
                                    "url" => array( "route" => "pedido/admin", "htmlOptions" => $htmlOptions),
                                    "label" => "Pedidos",
                                 ),
                                 array(
                                    "url" => array( "route" => "tipoEstadoPedido/admin", "htmlOptions" => $htmlOptions),
                                    "label" => "Estados de pedido",
                                 ),
                                 array(
                                    "url" => array( "route" => "empresa/update?id=".Yii::app()->empresa->getModel()->id, "htmlOptions" => $htmlOptions),
                                    "label" => "Empresa",
                                 ),
                                 array(
                                    "url" => array( "route" => "descriptor/admin", "htmlOptions" => $htmlOptions),
                                    "label" => "Descriptores",
                                 ),
                                 array(
                                    "url" => array( "route" => "reglaValidacion/admin", "htmlOptions" => $htmlOptions),
                                    "label" => "Reglas de validación",
                                 ),
                                 array(
                                    "url" => array( "route" => "tipoIva/admin", "htmlOptions" => $htmlOptions),
                                    "label" => "Tipos de IVA",
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