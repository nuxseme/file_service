<?php
namespace api;
class FileUploadController extends BaseController
{
    public function post()
    {
        //数字签名校验
        if(!$this->sign()) {
            return fail('Signature error');
        }
        //参数解析
        if(empty($_FILES)) {
            return fail('Not yet received the data');
        }
        try {
            $root = \ConfigService::getInstance()->get('root');
            $result = [];
            foreach ($_FILES as $file) {
                //上传文件名
                $file_name = $file['name'];
                //签名
                $sign           = $_POST['sign'];
                $file_save_name = $sign . $file_name;
                $file_path      = \FileService::createPath($file_save_name);
                $file_dir       = dirname($root . $file_path);
                if (!is_dir($file_dir)) {
                    \FileService::createDir($file_dir);
                }
                rename($file['tmp_name'], $root . $file_path);
                $result[$file_name]['url']['view']     = DS . $file_path;
                $result[$file_name]['url']['download'] = DS . 'download' . DS . $file_path;
            }
            return success('success',0,$result);
        }catch (\Exception $e) {
            return fail($e->getMessage());
        }


    }
}