<?php
/**
 * Index控制器
 * Created by PhpStorm.
 * Date: 2018/1/17
 * Time: 22:28
 */
namespace app\ctrl;
class indexCtrl extends \core\kj
{
    public function index()
    {
        $pModel = new \core\lib\model();
        $sql = 'select * from wl_menu';
        $res = $pModel->query($sql);
        $data = $res->fetchAll();
        $data = 'data值';

        $this->assign('data', $data);
        $this->display('index.html');
    }

    public function ads()
    {
        echo 2;
        echo 2;


        echo 22222333;
        echo 1111;
    }
}