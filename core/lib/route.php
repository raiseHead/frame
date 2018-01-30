<?php
/**
 * 路由
 * Created by PhpStorm.
 * Date: 2018/1/16
 * Time: 22:22
 */
namespace core\lib;
use core\lib\config;
class route {
    public $ctrl;
    public $action;
    public function __construct()
    {
        if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') {
            $path = $_SERVER['PATH_INFO'];
            $arr = explode('/', trim($path, '/'));
            $this->ctrl =  $arr[0];
            unset($arr[0]);
            if (!isset($arr[1])) {
                $this->action = config::get('ACTION', 'route');
            } else {
                $this->action =  $arr[1];
                unset($arr[1]);
            }
            $count = count($arr) + 2;
            $i = 2;
            while ($i < $count) {
                if (isset($arr[$i + 1])) {
                    $_GET[$arr[$i]] = $arr[$i + 1];
                }
                $i = $i + 2;
            }
        } else {
            $this->ctrl = config::get('CTRL', 'route');
            $this->action = config::get('ACTION', 'route');
        }

    }
}