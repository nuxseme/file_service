<?php
require(__DIR__ . '/autoload.php');
require(__DIR__ . '/function.php');
define('DS',DIRECTORY_SEPARATOR);
ToroHook::add("404", function() {
    echo "Not Found";
});

Toro::serve([
    '/'       => 'HelloController',
    '/file/upload' => 'FileUploadController',
    '/img/upload' => 'ImgUploadController',
    '/:number/:number/:number/:alpha/download' => 'DownloadController'
]);
