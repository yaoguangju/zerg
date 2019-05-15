<?php

// 获取商品所属的栏目
function getCategory($category_id){
    switch ($category_id)
    {
        case 2:
            return '果味';
            break;
        case 3:
            return '蔬菜';
            break;
        case 4:
            return '炒货';
            break;
        case 5:
            return '点心';
            break;
        case 6:
            return '粗茶';
            break;
        default:
            return '淡饭';
    }
}

// 根据订单状态是否发货的
function getOrderStatus($status){
    switch ($status)
    {
        case 1:
            return '未支付';
            break;
        case 2:
            return '已支付';
            break;
        case 3:
            return '已发货';
            break;
        default:
            return '已发货，但库存不足';
    }
}

