<?php

namespace app\api\model;

use think\Model;

class Banner extends BaseModel
{
    public function items()
    {
        // 一对多的关系
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    /**
     * @param $id int banner所在位置
     * @return Banner
     */
    public static function getBannerById($id)
    {
        // 查询banner的时候要带有items和items下的img
        $banner = self::with(['items','items.img'])->find($id);

        return $banner;
    }
}
