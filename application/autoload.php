<?php
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = [
				'HelloController' => '/HelloController.php',
                'FileUploadController' => '/api/FileUploadController.php',
                'ImgUploadController' => '/api/ImgUploadController.php',
			];
        }
        if (isset($classes[$class])) {
            require __DIR__ . $classes[$class];
        }
    },
    true,
    false
);
require(__DIR__.'/../vendor/autoload.php');
