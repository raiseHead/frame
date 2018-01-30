<?php
/**
 * 文件存储日志
 * Created by PhpStorm.
 * Date: 2018/1/27
 * Time: 21:33
 */
namespace core\lib\drive\log;

use core\lib\config;

class file
{
    //日志存储位置
    public $path;

    public function __construct()
    {
        $this->path = config::get('OPTION', 'log')['PATH'];
    }

    /**
     * 写日志
     * 1.文件是否存在
     * 新建目录
     * 2.创建文件
     * @param $name
     * @param string $file
     */
    public function log($message, $file =  'log')
    {
        $path = $this->path;
        if(!is_dir($path.'\\'.date('YmdH'))) {
            mkdir($this->path.'\\'.date('YmdH'), '0777', true);
        }

        return file_put_contents($this->path.'\\'.date('YmdH').  '\\'. $file . '.php', date('Y-m-d H:i:s') .json_encode($message).PHP_EOL, FILE_APPEND);
    }
}