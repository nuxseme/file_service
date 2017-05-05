<?php
require(__DIR__ . '/autoload.php');

ToroHook::add("404", function() {
    echo "Not Found 这里需要设置跳转到帮助界面";
});

Toro::serve([
    '/'       => 'HelloController',
    '/file/upload' => 'FileUploadController',
    '/img/upload' => 'ImgUploadController',
]);
