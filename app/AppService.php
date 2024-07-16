<?php
declare (strict_types=1);

namespace app;

use think\Service;

use pv\utils\Json;
use pv\utils\JwtAuth;

/**
 * 应用服务类
 */
class AppService extends Service
{
    // 服务注册
    public array $bind = [
        'json' => Json::class,
        'jwt' => JwtAuth::class,
    ];
}
