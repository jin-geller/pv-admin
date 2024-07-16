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

class Role extends BaseModel
{
    use SoftDelete;

    protected string $deleteTime = 'delete_time';

    public array $setSearchField = ['=' => ['status'=>'select'], '%like%' => ['name'=>'text']];
    public array $setSortField = [];
    public array $setSortDefault = [];

    /**
     * @notes role 和 menu 多对多关联
     * @return BelongsToMany
     */
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, RoleMenu::class);
    }
}
