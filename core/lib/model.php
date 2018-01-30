<?php
/**
 * 模型
 * Created by PhpStorm.
 * Date: 2018/1/17
 * Time: 22:40
 */
namespace core\lib;

use \core\lib\config;
class model extends \PDO
{
    public function __construct()
    {
        $databaseConfig = config::getAll('database');

        try {
            parent::__construct($databaseConfig['DSN'], $databaseConfig['USERNAME'], $databaseConfig['PASSWORD']);
        } catch (\PDOException $e) {
            p($e->getMessage().'123');
        }
    }
}