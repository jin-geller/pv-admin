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

use pv\model\StaffRole;
use pv\basic\BaseLogic;

class StaffRoleLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param StaffRole $model
     */
    public function __construct(StaffRole $model){
        $this->model =$model;
    }
}
