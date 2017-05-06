<?php
class BaseController
{
    public function sign()
    {
        //数据签名校验
        $user = $_POST['user'] ?? '';
        $platform = $_POST['platform'] ?? '';
        $timestamp = $_POST['timestamp'];
        $name = $_POST['name'] ?? '';
        $sign = $_POST['sign'] ?? '';

        $sign_array = compact('user','platform', 'timestamp', 'name');
        $sign_array['token'] = ConfigService::getInstance()->get('token');
        sort($sign_array,SORT_STRING);
        $tmpStr = implode($sign_array);
        return $sign == sha1($tmpStr) ? true : false;
    }
}