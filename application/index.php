<?php
require(__DIR__ . '/autoload.php');
require(__DIR__ . '/function.php');

ToroHook::add("404", function() {
    echo "Not Found";
});
ToroHook::add('before_request', function($routes) {
    echo 'before_request，处理';
});

Toro::serve([
    '/'       => 'HelloController',
    '/file/upload' => 'FileUploadController',
    '/img/upload' => 'ImgUploadController',
]);
