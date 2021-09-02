<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//require_once($yii);
//Yii::createWebApplication($config)->run();

//CAMBIO REALIZADO PARA EL EXCEL
require_once($yii);
    // no corren aplicación antes de registrarse YiiExcel autocarga 
    $app = Yii::createWebApplication($config);
 
    Yii::import('ext.yiiexcel.YiiExcel', true);
    Yii::registerAutoloader(array('YiiExcel', 'autoload'), true);
 
 
    // Ahora se puede ejecutar la aplicación 
    $app->run();