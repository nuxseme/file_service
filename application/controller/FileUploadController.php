<?php
namespace app;

class FileUploadController
{
    //操作界面显示
    public function get()
    {
        include(__DIR__ . "/../views/file-upload/index.php");
    }

    //处理上传
    public function post()
    {
        if (empty($_FILES['uploadfiles'])) {
            $result = [
                'files' => [
                    0 => [
                        'error' => '未收到上传文件'
                    ]
                ]
            ];
            exit(json_encode($result));
        }
        $files = $_FILES['uploadfiles'];
        //处理多数组
        try {
            $result = [];
            $root   = \ConfigService::getInstance()->get('root');
            foreach ($files['tmp_name'] as $index => $item) {
                $file           = new \stdClass();
                $file->name     = $files['name'][$index];
                $file->tmp_name = $files['tmp_name'][$index];
                $file->type     = $files['type'][$index];
                $file->size     = $files['size'][$index];
                $file->error    = $files['error'][$index];

                //文件名格式校验
                if (!!strstr($file->name, ' ')) {
                    $file->error = '文件名格式错误(请勿包含空格)';
                    $result[]    = $file;
                    break;
                }
                //保存文件
                $file_path = \FileService::createPath($file->name);
                $target    = $root . $file_path;
                if (!is_dir(dirname($target))) {
                    mkdir(dirname($target), 0775, true);
                }
                if (move_uploaded_file($file->tmp_name, $target)) {
                    $file->url = DS . 'download' . DS . $file_path;
                } else {
                    $file->error = '服务器保存文件失败';
                }

                $result[] = $file;
            }
            exit(json_encode(['files' => $result]));
        } catch (\Exception $e) {
            $result = [
                'files' => [
                    0 => [
                        'error' => 'server error'
                    ]
                ]
            ];
            exit(json_encode($result));
        }
    }
}