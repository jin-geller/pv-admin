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

Route::group('dept', function () {
    Route::any('list', 'list');
    Route::any('save', 'save');
    Route::any('delete', 'delete');
})->prefix('organization.department/');
Route::group('staff', function () {
    Route::any('list', 'list');
    Route::any('save', 'save');
    Route::any('delete', 'delete');
    Route::any('search_fields', 'searchFields');
})->prefix('organization.staff/');
Route::group('role', function () {
    Route::any('list', 'list');
    Route::any('save', 'save');
    Route::any('delete', 'delete');
    Route::any('search_fields', 'searchFields');
})->prefix('organization.role/');