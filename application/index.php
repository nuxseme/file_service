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
    '/file/upload' => 'api\FileUploadController',
    '/img/upload' => 'ImgUploadController',
    '/:number/:number/:number/:alpha/download' => 'DownloadController',
    '/file/upload/index' => 'app\FileUploadController',
]);
