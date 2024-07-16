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
declare(strict_types=1);
namespace pv\basic;

use think\App;

abstract class BaseDao
{
    /**
     * @notes 应用容器
     * @var App
     */
    public App $app;

    /**
     * @notes 请求参数
     * @var array
     */
    public array $params;

        /**
     * @notes 登录用户信息
     * @var array
     */
    public array $userInfo=[];

    /**
     * @notes 登录用户id
     * @var int
     */
    public int $userId=0;

    /**
     * @notes constructor
     */
    public function __construct()
    {
        $this->app = app();
        $this->params = request()->param();
        if(isset($this->request->userInfo) && $this->request->userInfo){
            $this->userInfo=$this->request->userInfo;
            $this->userId=$this->request->userInfo['id'];
        }
    }

    /**
     * @notes 实例对象反射
     * @param array $args
     * @return static
     */
    public static function instance(...$args): BaseDao
    {
        return invoke(static::class, $args);
    }
}