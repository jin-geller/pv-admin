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

namespace pv\model;

use think\model\concern\SoftDelete;
use think\model\Pivot;

class RoleMenu extends Pivot
{
    use SoftDelete;

    protected string $deleteTime = 'delete_time';
    protected $autoWriteTimestamp = true;
}
