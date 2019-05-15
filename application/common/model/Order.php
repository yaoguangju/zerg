<?php

namespace app\common\model;

use think\Model;

class Order extends Model
{
    //
    protected $pk = 'id';
    protected $table = 'order';
    //开启自动加入时间
    protected $autoWriteTimestamp = true;
    protected $hidden = ['user_id', 'delete_time', 'update_time'];
}
