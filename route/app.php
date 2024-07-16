<?php
// +----------------------------------------------------------------------
// | PvAdmin Administrative Backend ( PHP + Vue )
// +----------------------------------------------------------------------
// | Copyright © 2024-present www.pvadmin.cn All Rights Reserved
// +----------------------------------------------------------------------
// | License: MIT License ( https://mit-license.org )
// +----------------------------------------------------------------------
// | Author: PvAdmin Team
// +----------------------------------------------------------------------
use think\facade\Route;

// 管理后台
Route::rule('run/:any', function () {
    return view(app()->getRootPath() . 'public/run/index.html');
})->pattern(['any' => '\w+']);

//路由miss
Route::miss(function () {
    return view(app()->getRootPath() . 'public/index/index.html');
//    return resultJson("路由miss", 0);
});