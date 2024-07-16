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
declare (strict_types=1);
use think\facade\Route;

Route::group('login', function () {
    Route::any('index', 'index');
    Route::any('refresh_token', 'refreshToken');
})->prefix('login/');

//路由miss
Route::miss(function () {
    return resultJson("路由miss", 0);
});