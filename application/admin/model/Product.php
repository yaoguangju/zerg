<?php

namespace app\admin\model;


class Product extends BaseModel
{
    protected $autoWriteTimestamp = true;

//    public function add($data){
//
//        $result = $this->validate(true)->save($data);
//        if($result == false){
//            return ['valid' => 0,'msg'=>$this->getError()];
//        }
//        else{
//            return ['valid' => 1,'msg'=>'添加成功'];
//        }
//
//    }

}
