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

        $files = $_POST['flies'] ?? [];
        //参数解析
        if(empty($files)) {
            return fail('Not yet received the data');
        }


//        $img_base_dir = Yii::$app->params['img_base_dir'];
//        try {
//            //删除旧目录下所有文件
//            foreach ($post as $path => $value) {
//                $sku_dir = $img_base_dir.dirname($path);
//                if(is_dir($sku_dir)) {
//                    $files = scandir($sku_dir);
//                    foreach ($files as $file) {
//                        $file_path = $sku_dir.'/'.$file;
//                        if ($file != '.' && $file != '..' && !is_dir($file_path)) {
//                            unlink($file_path);
//                        }
//                    }
//                }
//            }
//            foreach ($post as $path => $img_base64) {
//                $path     = $img_base_dir . $path;
//                Yii::info($path,__METHOD__);
//                $file_dir = dirname($path);
//                if (!file_exists($file_dir)) {
//                    ImageService::createDir($file_dir);
//                }
//                $img_tmp = base64_decode($img_base64);
//                file_put_contents($path, $img_tmp);
//            }
//            $result = [
//                'version' => 1,
//                'code' => 200,
//                'description' => 'Success'
//            ];
//            return $result;
//        }catch (\Exception $e){
//            Yii::error($e->getMessage(),'erp-image-upload-error');
//            $result = [
//                'version' => 1,
//                'code' => 400,
//                'description' => $e->getMessage()
//            ];
//            return $result;
//        }
    }
}