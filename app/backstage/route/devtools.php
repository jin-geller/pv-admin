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

Route::group('db', function () {
    Route::get('list', 'list');
    Route::post('backup', 'backup');
    Route::post('optimize', 'optimize');
    Route::post('repair', 'repair');
    Route::get('file_list', 'fileList');
    Route::post('file_del', 'fileDel');
    Route::get('file_download', 'fileDownload');
    Route::post('file_import', 'fileImport');
})->prefix('devtools.database/');