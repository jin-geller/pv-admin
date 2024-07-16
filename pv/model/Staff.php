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

class Staff extends BaseModel
{
    //软删除
    use SoftDelete;

    protected string $deleteTime = 'delete_time';
    public array $setSearchField = [
        '=' => [
            'status'=>'select',
            'sex'=>'select',
            'dept_id'=>'select',
        ],
        '%like%' => [
            'username'=>'text',
            'nickname'=>'text',
            'phone'=>'text',
            'email'=>'text'
        ]
    ];

    /**
     * @notes Staff 和 Role 多对多关联
     * @return BelongsToMany
     */
    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class,StaffRole::class);
    }

    /**
     * @notes 密码修改器
     * @param $value
     * @return string
     */
    public function setPasswordAttr($value): string
    {
        return password_hash($value,PASSWORD_DEFAULT);
    }
}
