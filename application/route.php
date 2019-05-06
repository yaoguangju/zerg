<?php

use think\Route;

//Banner
Route::get('api/banner/:id', 'api/Banner/getBanner');

//Theme
Route::get('api/theme', 'api/Theme/getSimpleList');
Route::get('api/theme/:id', 'api/Theme/getComplexOne');
Route::post('api/theme/:t_id/product/:p_id', 'api/Theme/addThemeProduct');
Route::delete('api/theme/:t_id/product/:p_id', 'api/Theme/deleteThemeProduct');

//Product
Route::get('api/product/recent', 'api/Product/getRecent');
Route::post('api/product', 'api/Product/createOne');
Route::delete('api/product/:id', 'api/Product/deleteOne');
Route::get('api/product/by_category', 'api/Product/getAllInCategory');
Route::get('api/product/:id', 'api/Product/getOne');

//Category
Route::get('api/category', 'api/Category/getCategories'); 
Route::get('api/category/all', 'api/Category/getAllCategories');

//Token
Route::post('api/token/user', 'api/Token/getToken');
Route::post('api/token/app', 'api/Token/getAppToken');
Route::post('api/token/verify', 'api/Token/verifyToken');

//Address
Route::post('api/address', 'api/Address/createOrUpdateAddress');
Route::get('api/address', 'api/Address/getUserAddress');

//Order
Route::post('api/order', 'api/Order/placeOrder');
Route::get('api/order/:id', 'api/Order/getDetail',[], ['id'=>'\d+']);
Route::put('api/order/delivery', 'api/Order/delivery');

//不想把所有查询都写在一起，所以增加by_user，很好的REST与RESTFul的区别
Route::get('api/order/by_user', 'api/Order/getSummaryByUser');
Route::get('api/order/paginate', 'api/Order/getSummary');

//Pay
Route::post('api/pay/pre_order', 'api/Pay/getPreOrder');
Route::post('api/pay/notify', 'api/Pay/receiveNotify');
Route::post('api/pay/re_notify', 'api/Pay/redirectNotify');
Route::post('api/pay/concurrency', 'api/Pay/notifyConcurrency');

//Message
Route::post('api/message/delivery', 'api/Message/sendDeliveryMsg');







