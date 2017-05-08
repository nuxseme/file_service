<?php


namespace api;


class TestController
{
    public function post()
    {

        //php服务器保留上传文件
//        foreach ($_FILES as $file_key => $file)
//        {
//            rename($file['tmp_name'],'/tmp/'.$file['name']);
//            $params[$file_key] = new \CURLFile('/tmp/'.$file['name'],$file['type'],$file['name']);
//        }
        $user = 'heyd';
        $timestamp = time();
        $platform = 'webpos';

        $temp = compact('user', 'timestamp','platform');
        $temp['token'] = 'tomtop';
        sort($temp,SORT_STRING);

        $tmpStr = implode($temp);
        $sign = sha1($tmpStr);
        $params['user'] = $user;
        $params['timestamp'] = $timestamp;
        $params['platform'] = $platform;
        $params['sign'] = $sign;
        print_r($params);
        //php服务器不保留上传文件
        $files = $_FILES['file'];
        print_r($files);
        foreach ($files['tmp_name'] as $index=>$item) {
            $params[$files['name'][$index]] = new \CURLFile($files['tmp_name'][$index], $files['type'][$index], $files['name'][$index]);
        }
         $ch =curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://files.tomtop.com/api/file/upload');
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $content = curl_exec($ch);
        $aStatus = curl_getinfo($ch);
        echo $content;
        print_r($aStatus);
    }
    public function get()
    {
        //echo 'todo:接受文件上传';

        include(__DIR__ . "/../views/api/file-upload/index.php");
    }
}