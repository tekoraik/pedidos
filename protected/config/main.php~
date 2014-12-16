<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Gestión de pedidos',
    'theme'=>'default',
    'sourceLanguage'=>'es_ES',
    'language' => 'es',
	// preloading 'log' component
	'preload'=>array('log', 'bootstrap', 'empresa', 'pedido'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		//Rights module and components
		'application.modules.rights.*',
        'application.modules.rights.components.*',
	),
    'aliases' => array(
        'RestfullYii' =>realpath(__DIR__ . '/../extensions/starship/RestfullYii'),
    ),
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'2310',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'rights'=>array(
		    'userClass' => 'Usuario',
		    'superuserName'=>'Admin',
            'authenticatedName'=>'Authenticated',
            'userIdColumn'=>'id',
            'userNameColumn'=>'email',
            'enableBizRule'=>true,
            'enableBizRuleData'=>false,
            'displayDescription'=>true,
            'flashSuccessKey'=>'RightsSuccess',
            'flashErrorKey'=>'RightsError',
            'install'=>true,
            'baseUrl'=>'/rights',
            'layout'=>'rights.views.layouts.main',
            'appLayout'=>'application.modules.admin.views.layouts.main',
            'debug'=>false,
            'install'=>false,
        )
		
	),

	// application components
	'components'=>array(
		//model components
		'empresa' => array(
            'class' => 'application.components.model.EmpresaComponent'
        ),
        'categoria' => array(
            'class' => 'application.components.model.CategoriaComponent'
        ),
        'pedido' => array(
            'class' => 'application.components.model.PedidoComponent'
        ),
        //Boostrap (Yii Booster) component
		'bootstrap' => array(
    		'class' => 'application.extensions.booster.components.Bootstrap',
		),
		//Rights components
		'user'=>array(
            'class'=>'RWebUser',
            'allowAutoLogin'=>true,
        ),
        'authManager'=>array(
            'class'=>'RDbAuthManager',

        ),
		
        //urlManager
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
			    'api/pedido/addProducto' =>array ('pedido/addProducto', 'verb'=>'PUT'),
			    'api/pedido/realizar' =>array ('pedido/realizar', 'verb'=>'PUT'),
			    'api/<controller:\w+>'=>array ('<controller>/REST.GET', 'verb'=>'GET'),
                'api/<controller:\w+>/<id:\w*>'=> array('<controller>/REST.GET', 'verb'=>'GET'),
                'api/<controller:\w+>/<id:\w*>/<param1:\w*>'=>array('<controller>/REST.GET', 'verb'=>'GET'),
                'api/<controller:\w+>/<id:\w*>/<param1:\w*>/<param2:\w*>'=>array('<controller>/REST.GET', 'verb'=>'GET'),
            
                array('<controller>/REST.PUT', 'pattern'=>'api/<controller:\w+>/<id:\w*>', 'verb'=>'PUT'),
                array('<controller>/REST.PUT', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>', 'verb'=>'PUT'),
                array('<controller>/REST.PUT', 'pattern'=>'api/<controller:\w*>/<id:\w*>/<param1:\w*>/<param2:\w*>', 'verb'=>'PUT'), 
            
                array('<controller>/REST.DELETE', 'pattern'=>'api/<controller:\w+>/<id:\w*>', 'verb'=>'DELETE'),
                array('<controller>/REST.DELETE', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>', 'verb'=>'DELETE'),
                array('<controller>/REST.DELETE', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>/<param2:\w*>', 'verb'=>'DELETE'),
            
                array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>', 'verb'=>'POST'),
                array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>/<id:\w+>', 'verb'=>'POST'),
                array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>', 'verb'=>'POST'),
                array('<controller>/REST.POST', 'pattern'=>'api/<controller:\w+>/<id:\w*>/<param1:\w*>/<param2:\w*>', 'verb'=>'POST'),
            
            
				'gii'=>'gii',
          		'gii/<controller:\w+>'=>'gii/<controller>',
          		'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>', 
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'producto/categoria/<categoria_slug:[a-z0-9-]+>' => 'producto/index',
				
                
            
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=pedidos',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		
	),
);
