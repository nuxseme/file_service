<?php
require(__DIR__ . '/autoload.php');

ToroHook::add("404", function() {
    echo "Not Found ������Ҫ������ת����������";
});

Toro::serve([
    '/'       => 'HelloController',
    '/file/upload' => 'FileUploadController',
    '/img/upload' => 'ImgUploadController',
]);
