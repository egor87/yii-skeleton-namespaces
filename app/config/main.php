<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__) . DS . '..'));

// Namespaces
Yii::setPathOfAlias('app', ROOT . '/');
Yii::setPathOfAlias('modMain', ROOT . '/modules/main/');

require_once('params.php');

$config = array(
	
	// system
	'basePath' => ROOT,
	'name' => 'lk',
	'runtimePath' => ROOT . '/../data/tmp',

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.components.resources.*',
		'application.components.helpers.*',
		'application.components.widgets.*',
		'application.forms.*',
		'application.extensions.browser.*',
		'application.extensions.firephp.*',
		'application.extensions.yii-mail.*',
	),
	
	'sourceLanguage' => 'ru',

	'modules'=>array(
		'main' => array(
			'class' => '\app\modules\main\MainModule',
		),
	),
	
	'defaultController' => 'main/index/index',
	
	// application components
	'preload' => array('log'),
	
	'components' => array(
		'errorHandler'=>array(
			'errorAction' =>'main/common/error',
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				// routes
			)
		),
		'cache' => array(
            'class' => 'CMemCache',
			'keyPrefix' => $_SERVER['APP_NAME'] . '_',
            'servers' => array(
                array('host' => 'localhost', 'port' => 11211),
            ),
        ),
		'session' => array(
			'timeout' => 86400,
			'cookieMode' => 'only',
			'sessionName' => 'sid',
			'savePath' => ROOT . '/../data/sessions',
			'cookieParams' => array(
				'httponly' => true,
		   ),
        ),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				// standard log route
				array(
					'class' => 'SFirePHPLogRoute', 
					'levels' => 'error, warning, info',
				),
				// profile log route
				array(
					'class' => 'SFirePHPProfileLogRoute',
					'report' => 'callstack',
				),
			),
		),
		// Объедение и сжатие скриптов/стилей
		'clientScript' => array(
			'class' => 'application.extensions.ExtendedClientScript.ExtendedClientScript',
			'excludeCssFiles' => array('theme.css'),
			'excludeJsFiles' => array('theme.js'),
			'scriptMap' => array(
				'jquery.js' => FALSE,
			),
		),
		// Определение браузера
		'browser' => array(
			'class' => 'application.extensions.browser.CBrowserComponent',
		),
		// Mail
		'mail' => array(
			'class' => 'application.extensions.yii-mail.YiiMail',
			'transportType' => 'smtp',
			'transportOptions' => array('host' => 'host ip'),
			'viewPath' => 'application.mail.views',
			'layoutsPath' => 'application.mail.views.layouts',
			'logging' => FALSE,
			'dryRun' => FALSE,
		),
	),
	// custom params
	'params' => $commonParams
);

return $config;
