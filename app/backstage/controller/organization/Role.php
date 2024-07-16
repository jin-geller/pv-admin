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

namespace app\backstage\controller\organization;

use app\backstage\logic\RoleLogic;
use pv\basic\BaseController;
use think\response\Json;

class Role extends BaseController
{
    /**
     * @notes constructor
     * @param RoleLogic $logic
     */
    public function __construct(RoleLogic $logic)
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

    public function searchFields(): Json
    {
        return $this->logic->searchFields();
    }
}
