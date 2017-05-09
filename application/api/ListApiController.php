<?php


namespace api;


class ListApiController
{
    public function get()
    {
       $urlPrefix = \HttpService::getUrlPrefix();
        $apis = [
            'image_upload_url' => $urlPrefix.'/api/img/upload',
            'file_upload_url' => $urlPrefix.'/api/file/upload',
            'download_url' => $urlPrefix.'/api/download/{file_path}',
        ];
        exit(json_encode($apis));
    }
}