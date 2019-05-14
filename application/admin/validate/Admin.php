<?php
/**
 * Created by PhpStorm.
 * User: mochen
 * Date: 2019-05-06
 * Time: 17:37
 */

namespace app\admin\validate;


use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'app_id' => 'require',
        'app_secret' => 'require',
    ];
    protected $msg = [
        'app_id.require' => '账号必须',
        'app_secret.require' => '密码必须',
    ];

}