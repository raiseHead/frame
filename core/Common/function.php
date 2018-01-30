<?php
/**
 * 公共方法
 * Created by PhpStorm.
 * Date: 2018/1/16
 * Time: 22:11
 */

function p($val)
{
    if (is_bool($val)) {
        var_dump($val);
    } else if (is_null($val)) {
        var_dump(NULL);
    } else {
        echo "</pre>";
        print_r($val);
    }
}