<?php
require(__DIR__ . '/../autoload.php');
define('APP_PATH',__DIR__);
define('DS',DIRECTORY_SEPARATOR);

$log_path = APP_PATH.DS.'record'.DS.'log';
$log = new Monolog\Logger('index');
$log->pushHandler(new Monolog\Handler\StreamHandler($log_path, Monolog\Logger::DEBUG));
$log->warning('Foo bubble false');
$log->error('Bar');
$log->info('info',['hello'=>'world']);