<?php
namespace api;
class BaseController
{
    public function sign()
    {
        $contentType = \HttpService::getContentType();
        if($contentType == 'application/json') {
            $_POST = json_decode(file_get_contents('php://input'),true);
        }
        //数据签名校验
        $user = $_POST['user'] ?? '';
        $platform = $_POST['platform'] ?? '';
        $timestamp = $_POST['timestamp'];
        $sign = $_POST['sign'] ?? '';

        $sign_array = compact('user','platform', 'timestamp');
        $sign_array['token'] = \ConfigService::getInstance()->get('token');
        sort($sign_array,SORT_STRING);
        $tmpStr = implode($sign_array);
        return $sign == sha1($tmpStr) ? true : false;
    }
}