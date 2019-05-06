<?php

namespace app\admin\controller;

use app\common\model\Admin;
use think\Controller;

class Login extends Controller
{
    public function login(){

        if($this->request->isPost()){
            $res = (new Admin())->login(input('post.'));
        }
        return $this->fetch('index');
    }
}
