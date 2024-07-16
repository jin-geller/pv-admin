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

use pv\model\Menu;
use pv\basic\BaseLogic;
use pv\utils\Reply;
use think\Collection;
use think\Response\Json;

class MenuLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param Menu $model
     */
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    /**
     * @notes 列表
     * @param int $is_route 是否为前端路由接口 默认0否
     * @param array $role_ids 登录用户所属角色id集合
     * @return Json
     */
    public function list(int $is_route = 0, array $role_ids=[]): Json
    {
        $with=['menuRoleMany'=>function($query){
            $query->where('pivot.delete_time is null');
        }];

        if($is_route) {
            $menuId = (new Menu())->alias('m')
                ->join('pv_role_menu rm', 'm.id = rm.menu_id')
                ->whereNull('rm.delete_time')
                ->whereIn('rm.role_id', $role_ids)
                ->column('m.id');
            $where[] = ['id', 'in', $menuId];
        }
        $res = $is_route?parent::pvSelect('listTrans',$with,$where):parent::pvSelect();
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson($res->getData());
    }

    /**
     * @notes 列表数据重组
     * @param $lists
     * @return Reply
     */
    public function listTrans($lists): Reply
    {
        foreach ($lists as $item) {
            $item['roles']=Collection::make($item['menuRoleMany'])->column('code');
        }
        return new Reply(0, arrayToTree($lists->toArray()));
    }

    /**
     * @notes 增改
     * @return Json
     */
    public function save(): Json
    {
        $res = parent::pvSave();
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson();
    }

    /**
     * @notes 删除
     * @return Json
     */
    public function delete(): Json
    {
        $res = parent::pvDelete();
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson();
    }
}
