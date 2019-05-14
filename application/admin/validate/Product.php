<?php
/**
 * Created by PhpStorm.
 * User: mochen
 * Date: 2019-05-04
 * Time: 16:15
 */
namespace app\admin\validate;

use think\Validate;

class Product extends Validate
{
    protected $rule = [
        'category_id' => 'require',
        'name' => 'require',
        'price' => 'require',
        'stock' => 'require'
    ];
    protected $message = [
        'category.require' => '请填写分类名称',
        'name.require' => '请填写商品名称',
        'price.require' => '请填写商品价格',
        'stock.require' => '请填写商品库存'
    ];

}