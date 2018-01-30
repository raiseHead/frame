<?php
/**
 * 日志文件
 * Created by PhpStorm.
 * Date: 2018/1/27
 * Time: 21:31
 */
namespace core\lib;
use core\lib\config;
class log
{
    static $class;
    /**
     * 1.日志存储方式：文件or数据库
     *
     * 2.写日志
     */

    static public function init()
    {
        //确认日志存储方式
        $drive = config::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class;
    }

    static public function log($name, $file = 'log')
    {
        self::$class->log($name, $file);
    }
}