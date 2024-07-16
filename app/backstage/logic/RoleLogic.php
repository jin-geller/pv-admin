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

use pv\model\Role;
use pv\basic\BaseLogic;
use pv\utils\Reply;
use think\Collection;
use think\response\Json;

class RoleLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * @notes 列表
     * @return Json
     */
    public function list(): Json
    {
        $with=['menus'=>function($query){
            $query->where('pivot.delete_time is null')->withField(['pv_menu.id']);
        }];
        $res = parent::pvSelect('listTrans',$with);
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson($res->getData());
    }

    /**
     * @notes 列表数据重组
     * @param $list
     * @return Reply
     */
    public function listTrans($list): Reply
    {
        foreach ($list as $item) {
            $item['menu_ids'] = Collection::make($item['menus'])->column('id');
        }
        return new Reply(0, $list->toArray());
    }

    /**
     * @notes 增改
     * @return Json
     */
    public function save(): Json
    {
        $with=[
            'func'=>'menus',
            'postField'=>'menu_ids',
            'withField'=>'menu_id'
        ];
        $res = parent::pvSave('saveWith',$with);
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson($res->getData());
    }

    /**
     * @notes 删除
     * @return Json
     */
    public function delete(): Json
    {
        $res = parent::pvDelete(['menus']);
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson(lang('10004'));
    }

    public function searchFields(): Json
    {
        $choicesArr=[
            'status'=>[
                ['label'=>'启用', 'value'=>1],
                ['label'=>'禁用', 'value'=>0]
            ]
        ];
        return resultJson(searchFieldsTrans($this->model->setSearchField,$choicesArr));
    }
}
