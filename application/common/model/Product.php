<?php

namespace app\common\model;

use think\Model;

class Product extends Model
{
    protected $pk = 'id';
    protected $table = 'product';
    //开启自动加入时间
    protected $autoWriteTimestamp = true;
    protected $hidden = [
        'delete_time', 'main_img_id', 'pivot', 'from', 'category_id',
        'create_time', 'update_time'
    ];

    // 关联商品的头图
    public function imgs()
    {
        // 一对多关联 一个商品有多个商品图片[被关联的模型，被关联模型和本模型的关联方法，本模型的主键]
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    // 关联商品的详情页的图
    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }


    // 保存商品数据
    public function store($data)
    {
        // 执行验证
        $validate = new \app\admin\validate\Product();
        if (!$validate->check($data)) {
            return ['vaild'=> 0 ,'msg'=>$validate->getError()];
        }
        // 添加到数据库
        $result = $this->save($data);
        if (false === $result) {
            return ['vaild' => 0, 'msg' => $this->getError()];
        } else {
            return ['vaild' => 1, 'msg' => '添加成功'];
        }
    }

    // 编辑商品
    public function edit($data){
        // 执行验证
        $validate = new \app\admin\validate\Product();
        if (!$validate->check($data)) {
            return ['vaild'=> 0 ,'msg'=>$validate->getError()];
        }
        // 添加到数据库
        $result = $this->save($data,[$this->pk=>$data['id']]);
        if (false === $result) {
            return ['vaild' => 0, 'msg' => $this->getError()];
        } else {
            return ['vaild' => 1, 'msg' => '修改成功'];
        }
    }

    // 删除商品
    public function del($id){
        $this->get($id)->delete();
    }
}
