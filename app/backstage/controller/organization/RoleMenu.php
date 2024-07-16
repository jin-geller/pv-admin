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

use app\backstage\logic\RoleMenuLogic;
use pv\basic\BaseController;

class RoleMenu extends BaseController
{
    /**
     * @notes constructor
     * @param RoleMenuLogic $logic
     */
    public function __construct(RoleMenuLogic $logic)
    {
        parent::__construct();
        $this->logic =$logic;
    }
}
