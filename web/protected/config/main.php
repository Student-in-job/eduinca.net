<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'language' => 'ru',
	'name' => Yii::t('site', 'sitename'),
        'theme' => 'classic',
        'defaultController' => 'site',
	'sourceLanguage' => 'en',
	// preloading 'log' component
	'preload'=>array('log'),

        'aliases' => array(
                'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change this if necessary
        ),
    
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'bootstrap.helpers.TbHtml',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
            'generatorPaths' => array('bootstrap.gii'),
			'class'=>'system.gii.GiiModule',
			'password'=>'pw',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'class' => 'UrlManager',
                        'rules'=>array(
                            '<lang:(ru|en)>' => 'site/index',
                            '<lang:(ru|en)>/<action:(contact|login|logout)>' => 'site/<action>',
                            '<lang:(ru|en)>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
                            '<lang:(ru|en)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                            '<lang:(ru|en)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),/*
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
                         */
		),
		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

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
                
                'bootstrap' => array(
                        'class' => 'bootstrap.components.TbApi',
                ),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'vitalik.pak@gmail.com',
	),
);
