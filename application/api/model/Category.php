<?php

namespace app\api\model;

class Category extends BaseModel
{
    public function products()
    {
        // hasMany 是一对多关联
        // hasOne 是一对一关联
        //
        return $this->hasMany('Product', 'category_id', 'id');
    }

    public function img()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public static function getCategories($ids)
    {
        $categories = self::with('products')->with('products.img')->select($ids);
        return $categories;
    }
    
    public static function getCategory($id)
    {
        $category = self::with('products')->with('products.img')->find($id);
        return $category;
    }
}
