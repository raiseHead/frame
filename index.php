<?php
/**
 * 入口文件
 * 1.常量
 * 2.函数库
 * 3.启动
 */
define('KJ_PATH', dirname(__FILE__));
define('CORE', KJ_PATH . '\core'); //核心文件
define('APP', KJ_PATH . '\app');  //项目文件
define('MODEL', 'app');

define('DEBUG', true);

if (DEBUG) {
    ini_set('display_error', 'on');
} else {
    ini_set('display_error', 'off');
}

include CORE . '\Common\function.php';
include CORE . '\kj.php';

spl_autoload_register('core\kj::load');

\core\kj::run();