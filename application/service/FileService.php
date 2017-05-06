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
        $Y=date("Y");
        $m=date("m");
        $d=date("d");
        return $Y.DS.$m.DS.$d.DS.$file_name;
    }

    public static function download($file)
    {
        if(!is_file($file)) {
            exit('文件不存在');
        }
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }
}