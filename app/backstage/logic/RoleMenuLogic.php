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

use pv\model\RoleMenu;
use pv\basic\BaseLogic;

class RoleMenuLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param RoleMenu $model
     */
    public function __construct(RoleMenu $model)
    {
        $this->model = $model;
    }
}
