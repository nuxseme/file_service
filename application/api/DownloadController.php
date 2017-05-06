<?php


class DownloadController
{
    public function get($y, $m, $d, $file_name)
    {
        $root = ConfigService::getInstance()->get('root');
        $target = $root.$y.DS.$m.DS.$d.DS.$file_name;
        FileService::download($target);
    }
}