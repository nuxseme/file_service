<?php


namespace api;


class ListApiController
{
    public function get()
    {
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        $apis = [
            'image_upload_url' => $http_type.$host.'/api/img/upload',
            'file_upload_url' => $http_type.$host.'/api/file/upload',
            'download_url' => $http_type.$host.'/api/download/{file_path}',
        ];
        exit(json_encode($apis));
    }
}