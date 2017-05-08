<?php
require(__DIR__ . '/autoload.php');
require(__DIR__ . '/function.php');

define('APP_PATH',__DIR__);
define('DS',DIRECTORY_SEPARATOR);

ToroHook::add("404", function() {
    echo "Not Found";
});

Toro::serve([
    '/'       => 'HelloController',
    '/api/file/upload' => 'api\FileUploadController',
    '/api/img/upload' => 'api\ImgUploadController',
    '/download/:number/:number/:number/:alpha' => 'api\DownloadController',
    '/file/upload/index' => 'app\FileUploadController',
    //'/api/file/test' => 'api\TestController',
]);
