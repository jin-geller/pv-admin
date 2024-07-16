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

Route::group('menu', function () {
    Route::any('route', 'route');
    Route::any('list', 'list');
    Route::any('save', 'save');
    Route::any('delete', 'delete');
})->prefix('system.menu/');

Route::group('staff_login', function () {
    Route::any('list', 'list');
    Route::any('search_fields', 'searchFields');
})->prefix('system.staffLogin/');
