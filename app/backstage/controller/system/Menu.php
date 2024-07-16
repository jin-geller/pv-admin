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

namespace app\backstage\controller\system;

use app\backstage\logic\MenuLogic;
use pv\basic\BaseController;
use think\response\Json;

class Menu extends BaseController
{
    /**
     * @notes constructor
     * @param MenuLogic $logic
     */
    public function __construct(MenuLogic $logic)
    {
        parent::__construct();
        $this->logic = $logic;
    }

    /**
     * @notes 列表
     * @return Json
     */
    public function list(): Json
    {
        return $this->logic->list();
    }

    /**
     * @notes 前端路由
     * @return Json
     */
    public function route(): Json
    {
        return $this->logic->list(1,$this->userInfo['role_ids']);
    }

    /**
     * @notes 增改
     * @return Json
     */
    public function save(): Json
    {
        return $this->logic->save();
    }

    /**
     * @notes 删除
     * @return Json
     */
    public function delete(): Json
    {
        return $this->logic->delete();
    }

}