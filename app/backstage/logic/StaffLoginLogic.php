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

use pv\model\Staff;
use pv\model\StaffLogin;
use pv\basic\BaseLogic;
use pv\model\User;
use pv\utils\Reply;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Response\Json;

class StaffLoginLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param StaffLogin $model
     */
    public function __construct(StaffLogin $model)
    {
        $this->model = $model;
    }

    /**
     * @notes 列表
     * @return Json
     */
    public function list(): Json
    {
        $res = parent::pvSelect('listTrans');
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
        $staff_list = (new Staff())->column('username','id');
        foreach ($list as &$item) {
            $item['username'] = $item['staff_id'] ? $staff_list[$item['staff_id']] : [];
            $item['type_str']=$this->model::TYPE_MAP[$item['type']];
        }
        return new Reply(0, $list->toArray());
    }

    public function searchFields(): Json
    {
        $choicesArr=[
            'staff_id'=>(new Staff())->column('username label,id value'),
            'type'=>arrayLabelValue($this->model::TYPE_MAP)
        ];
        return resultJson(searchFieldsTrans($this->model->setSearchField,$choicesArr));
    }
}
