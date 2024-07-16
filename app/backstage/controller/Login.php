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
namespace app\backstage\controller;

use app\backstage\logic\LoginLogic;
use pv\common\validate\LoginValidate;
use pv\basic\BaseController;
use think\response\Json;

class Login extends BaseController
{
    /**
     * @notes constructor
     * @param LoginLogic $logic
     */
    public function __construct(LoginLogic $logic)
    {
        parent::__construct();
        $this->logic = $logic;
    }

    /**
     * @notes 登录
     * @return Json
     */
    public function index(): Json
    {
        $params=(new LoginValidate())->post()->toCheck();
        return $this->logic->index($params);
    }

    /**
     * @notes 刷新token
     * @return Json
     */
    public function refreshToken(): Json
    {
        return $this->logic->refreshToken($this->request->param('refreshToken'));
    }
}