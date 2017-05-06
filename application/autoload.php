<?php
spl_autoload_register(
    function ($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = [
                'HelloController'      => '/HelloController.php',
                'api\FileUploadController' => '/api/FileUploadController.php',
                'ImgUploadController'  => '/api/ImgUploadController.php',
                'ThumbService'         => '/service/ThumbService.php',
                'FileService'          => '/service/FileService.php',
                'HttpService'          => '/service/HttpService.php',
                'ConfigService'          => '/service/ConfigService.php',
                'api\BaseController'     => '/api/BaseController.php',
                'DownloadController'     => '/api/DownloadController.php',
                'app\FileUploadController'     => '/controller/FileUploadController.php',
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
