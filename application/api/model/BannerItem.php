<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['id', 'img_id', 'banner_id', 'delete_time'];

    public function img()
    {
        // 一对一的关系
        return $this->belongsTo('Image', 'img_id', 'id');
    }

}
