<?php
class FileService
{
    /**
     * 递归创建指定目录
     * @param $dir
     */
    public static function createDir($dir)
    {
        mkdir($dir,0775,true);
    }

    /**
     * 保存文件
     * @param $filename
     * @param $target
     * @return bool
     */
    public static function save($filename, $target)
    {
        if(!is_dir(dirname($target))) {
            self::createDir(dirname($target));
        }
        return move_uploaded_file($filename,$target);
    }

    public static function createPath($file_name)
    {
        $root = ConfigService::getInstance()->get('root');
        $Y=date("Y");
        $m=date("m");
        $d=date("d");
        return $root.$Y.'/'.$m.'/'.$d.'/';
    }
}