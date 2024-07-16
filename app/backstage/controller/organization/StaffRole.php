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

use app\backstage\logic\StaffRoleLogic;
use pv\basic\BaseController;

class StaffRole extends BaseController
{
    /**
     * @notes constructor
     * @param StaffRoleLogic $logic
     */
    public function __construct(StaffRoleLogic $logic)
    {
        parent::__construct();
        $this->logic =$logic;
    }
}
