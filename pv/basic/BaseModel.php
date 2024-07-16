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
namespace pv\basic;

use think\Model;

class BaseModel extends Model
{
    /**
     * @notes 设置搜索条件
     * @example  <  ['='=>['id','type','age'],'>'=>['score','total']]  >
     * @var array
     */
    public array $setSearchField = [];
    /**
     * @notes 设置支持或允许的排序字段
     * @example <  ['age','score']  >
     * @var array
     */
    public array $setSortField = [];
    /**
     * @notes 设置默认的排序字段及排序方式
     * @example <  ['id'=>'desc','type'=>'asc']  >
     * @var array
     */
    public array $setSortDefault = [];
}
