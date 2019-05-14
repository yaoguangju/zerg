<?php

namespace app\common\model;

use think\Loader;
use think\Model;

class Admin extends Model
{
    protected $pk = 'id';
    protected $table = 'third_app';

    public function login($data)
    {
//        $validate = Loader::validate('Admin');
        // 定义一个验证器
//        $rule = [
//            'app_id' => 'require',
//            'app_secret' => 'require',
//        ];
//        $msg = [
//            'app_id.require' => '账号必须',
//            'app_secret.require' => '密码必须',
//        ];
//        $validate = new validate($rule,$msg);
        $validate = new \app\admin\validate\Admin();
        // 如果验证不通过
        if (!$validate->check($data)) {
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        // 比对用户名和密码是否正确
        $userInfo = $this->where('app_id',$data['app_id'])->where('app_secret',$data['app_secret'])->find();
        if(!$userInfo){
            return ['valid'=>0,'msg'=>'用户名或者密码不正确'];
        }
        session('admin.app_id',$userInfo['app_id']);
        session('admin.app_secret',$userInfo['app_secret']);
        return ['valid'=>1,'msg'=>'登录成功'];
    }
}
