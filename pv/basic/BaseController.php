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

namespace pv\basic;

use stdClass;
use think\App;
use think\Request;

/**
 * 控制器基础类
 */
class BaseController extends stdClass
{
    /**
     * Request实例
     * @var Request
     */
    protected Request $request;

    /**
     * 应用实例
     * @var App
     */
    protected App $app;

    /**
     * 控制器中间件
     * @var array
     */
    protected array $middleware = [];

    /**
     * 业务逻辑类
     * @var object
     */
    protected object $logic;

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
     * 构造方法
     * @access public
     */
    public function __construct()
    {
        $this->app = app();
        $this->request = $this->app->request;
        if(isset($this->request->userInfo) && $this->request->userInfo){
            $this->userInfo=$this->request->userInfo;
            $this->userId=$this->userInfo['id'];
        }
        // 控制器初始化
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {
    }
}
