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

use pv\model\Department;
use pv\model\Staff;
use pv\basic\BaseLogic;
use pv\utils\Reply;
use think\Collection;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response\Json;

class StaffLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param Staff $model
     */
    public function __construct(Staff $model)
    {
        $this->model = $model;
    }

    /**
     * @notes 列表
     * @return Json
     */
    public function list(): Json
    {
        $with=['roles'=>function($query){
            $query->where('pivot.delete_time is null')->withField(['pv_role.id']);
        }];
        $res = parent::pvSelect('listTrans',$with);
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson($res->getData());
    }

    /**
     * @notes 列表数据重组
     * @param $list
     * @return Reply
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function listTrans($list): Reply
    {
        $dept_list = array_column((new Department())->select()->toArray(), null, 'id');
        foreach ($list as $item) {
            $item['dept'] = $item['dept_id'] ? $dept_list[$item['dept_id']] : [];
            $item['role_ids'] = Collection::make($item['roles'])->column('id');
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
            'func'=>'roles',
            'postField'=>'role_ids',
            'withField'=>'role_id'
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
        $res = parent::pvDelete(['roles']);
        if ($res->getCode()) return resultJson($res->getMsg(), 0);
        return resultJson(lang('10004'));
    }

    public function searchFields(): Json
    {
        $choicesArr=[
            'dept_id'=>(new Department())->column('name label,id value'),
            'status'=>[
                ['label'=>'激活','value'=>1],
                ['label'=>'禁用','value'=>0],
            ],
            'sex'=>[
                ['label'=>'男','value'=>0],
                ['label'=>'女','value'=>1],
            ]
        ];
        return resultJson(searchFieldsTrans($this->model->setSearchField,$choicesArr));
    }
}
