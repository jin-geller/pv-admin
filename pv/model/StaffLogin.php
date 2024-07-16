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

class StaffLogin extends BaseModel
{

    protected $updateTime=false;

    const TYPE_SUCCESS=0;
    const TYPE_ERROR=1;
    const TYPE_DISABLED=2;
    const TYPE_MULTIPLE_ERROR=3;

    const TYPE_MAP=[
        self::TYPE_SUCCESS=>'登录成功！',
        self::TYPE_ERROR=>'密码错误！',
        self::TYPE_DISABLED=>'账号禁用！',
        self::TYPE_MULTIPLE_ERROR=>'密码连续多次错误！',
    ];

    /**
     * @notes 设置搜索条件
     * @example  < ['='=>['id','type','age'],'>'=>['score','total']] >
     * @var array
     */
    public array $setSearchField = [
        '='=>[
            'type'=>'select',
            'staff_id'=>'select'
        ],
        '%like%'=>[
            'ip'=>'text'
        ],
        'between'=>[
            'create_time'=>'datetimerange'
        ],
    ];

    /**
     * @notes 设置支持或允许的排序字段
     * @example < ['age','score'] >
     * @var array
     */
    public array $setSortField = ['id'];

    /**
     * @notes 设置默认的排序字段及排序方式
     * @example < ['id'=>'desc','type'=>'asc'] >
     * @var array
     */
    public array $setSortDefault = ['id'=>'desc'];
}