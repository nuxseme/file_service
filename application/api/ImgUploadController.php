<?php

class ImgUploadController extends BaseController
{
    public function post()
    {
        //请求内容格式校验
        $contentType = HttpService::getContentType();
        if($contentType != 'application/json') {
            return fail("[$contentType] invalid content type ,accept application/json");
        }

        //数字签名校验
        if(!$this->sign()) {
            return fail('Signature error');
        }
        $files = $_POST['files'] ?? [];

        //参数解析
        if(empty($files)) {
            return fail('Not yet received the data');
        }
        try {
            $result = [];
            $root = ConfigService::getInstance()->get('root');
            //接收处理
            foreach ($files as $key => $item) {
                //上传文件名
                $file_name = $item['file_name'];
                //签名
                $sign = $_POST['sign'];
                $file_save_name = $sign.$file_name;
                $file_path = FileService::createPath($file_save_name);
                $file_dir = dirname($file_path);
                if (!is_dir($file_dir)) {
                    FileService::createDir($file_dir);
                }
                $img_base64 = $item['data'];
                $img_tmp = base64_decode($img_base64);
                file_put_contents($root.$file_path,$img_tmp);

                $result[$key]['file_name'] = $file_name;
                $result[$key]['url']['view'] = '/'.$file_path;
                $result[$key]['url']['download'] = '/'.$file_path;

            }
            return success('success',0,$result);
        } catch (\Exception $e) {
            return fail($e->getMessage());
        }
    }
}