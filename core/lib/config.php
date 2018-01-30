<?php
/**
 * 配置
 * Created by PhpStorm.
 * Date: 2018/1/27
 * Time: 21:04
 */

namespace core\lib;
class config
{
    static public $config = [];
    /**
     * 获取配置
     * 1. 文件是否存在
     * 2. 配置是否存在
     * 3. 缓存配置
     * @param $name
     * @param $file
     */
    static public function get($name, $file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file][$name];
        } else {
            $fileUrl = KJ_PATH . '\core\config\\' . $file . '.php';
            if(is_file($fileUrl)) {
                $conf = include $fileUrl;
                if (isset($conf[$name])) {
                    self::$config[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('找不到配置项' . $name);
                }

            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    /**
     * 获取全部配置
     * @param $file
     * @return mixed
     * @throws \Exception
     */
    static public function getAll($file)
    {
        if (isset(self::$config[$file])) {
            return self::$config[$file];
        } else {
            $fileUrl = KJ_PATH . '\core\config\\' . $file . '.php';
            if(is_file($fileUrl)) {
                $conf = include $fileUrl;
                self::$config[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}