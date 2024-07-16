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
use app\backstage\logic\StaffLoginLogic;
use pv\basic\BaseController;
use think\response\Json;

class StaffLogin extends BaseController
{
    /**
     * @notes constructor
     * @param StaffLoginLogic $logic
     */
    public function __construct(StaffLoginLogic $logic)
    {
        parent::__construct();
        $this->logic=$logic;
    }

    /**
     * @notes 列表
     * @return Json
     */
    public function list(): Json
    {
        return $this->logic->list();
    }

    public function searchFields(): Json
    {
        return $this->logic->searchFields();
    }
}