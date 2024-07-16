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

use pv\basic\BaseModel;
use think\model\concern\SoftDelete;
use think\model\relation\BelongsToMany;

class Menu extends BaseModel
{
    use SoftDelete;

    protected string $deleteTime = 'delete_time';

    public function getShowLinkAttr($value): bool
    {
        return boolval($value);
    }

    public function getKeepAliveAttr($value): bool
    {
        return boolval($value);
    }

    public function getShowParentAttr($value): bool
    {
        return boolval($value);
    }

    public function getStatusAttr($value): bool
    {
        return boolval($value);
    }

    public function getFrameLoadingAttr($value): bool
    {
        return boolval($value);
    }

    /**
     * @notes menu 和 role 多对多关联
     * @return BelongsToMany
     */
    public function menuRoleMany(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, RoleMenu::class);
    }
}
