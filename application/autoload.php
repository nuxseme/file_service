<?php
spl_autoload_register(
    function ($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = [
                'api\ListApiController'    => '/api/ListApiController.php',
                'api\FileUploadController' => '/api/FileUploadController.php',
                'api\ImgUploadController'  => '/api/ImgUploadController.php',
                'ThumbService'             => '/service/ThumbService.php',
                'FileService'              => '/service/FileService.php',
                'HttpService'              => '/service/HttpService.php',
                'ConfigService'            => '/service/ConfigService.php',
                'api\BaseController'       => '/api/BaseController.php',
                'api\DownloadController'   => '/api/DownloadController.php',
                'app\FileUploadController' => '/controller/FileUploadController.php',
                //'api\TestController' => '/api/TestController.php',
            ];
        }
        if (isset($classes[$class])) {
            require __DIR__ . $classes[$class];
        }
    },
    true,
    false
);
require(__DIR__ . '/../vendor/autoload.php');
