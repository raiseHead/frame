<?php
/**
 * 框架文件
 * Created by PhpStorm.
 * Date: 2018/1/16
 * Time: 22:18
 */
namespace core;

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class kj {
    public static $classMap = [];
    public $assign;
    static public function run()
    {
        require KJ_PATH."/vendor/autoload.php";
        $whoops = new Run;
        $handler = new PrettyPageHandler;
        $handler->setPageTitle("出现错误了");//设置报错页面的title
        $whoops->pushHandler($handler);
        $whoops->register();

        \core\lib\log::init();
        $route = new \core\lib\route;
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP . '/ctrl/'.$ctrlClass.'Ctrl.php';
        $class = '\\'.MODEL .'\\ctrl\\'. $ctrlClass .'Ctrl';
        if(is_file( $ctrlFile )) {
            include $ctrlFile;
            $p = new $class;
            $p->$action();
            \core\lib\log::log('ctrl:' . $ctrlClass . ' action:' . $action);
        } else {
            throw new \Exception('找不到控制器');

        }
    }

    /**
     * 自动加载类库
     */
    static public function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        }
        $class = str_replace('\\', '/', $class);
        $file = KJ_PATH .'/'. $class . '.php';
        if (is_file($file)) {
            include $file;
            self::$classMap[$class] = $class;
        } else {
            return false;
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($files)
    {
        $file = APP . '/views/' . $files;
        if (is_file($file)) {
            extract($this->assign);
            include $file;
        }
    }
}