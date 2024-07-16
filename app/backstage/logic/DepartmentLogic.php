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

namespace app\backstage\logic;

use pv\model\Department;
use pv\basic\BaseLogic;
use think\response\Json;

class DepartmentLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param Department $model
     */
    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    /**
     * @notes 列表
     * @return Json
     */
    public function list(): Json
    {
        $res = parent::pvSelect();
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson($res->getData());
    }

    /**
     * @notes 增改
     * @return Json
     */
    public function save(): Json
    {
        $res = parent::pvSave();
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson($res->getData());
    }

    /**
     * @notes 删除
     * @return Json
     */
    public function delete(): Json
    {
        $res = parent::pvDelete();
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson();
    }
}
