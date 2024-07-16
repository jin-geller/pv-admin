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
namespace pv\dao;

use Exception;
use pv\basic\BaseDao;
use pv\basic\BaseLogic;
use pv\utils\Reply;

class PvDeleteDao extends BaseDao
{
    /**
     * @notes 删除业务逻辑
     * @param BaseLogic $logic
     * @param array $with
     * @return Reply
     */
    public function handle(BaseLogic $logic, array $with= []): Reply
    {
        try {
            [$data,$model]=[$this->params,$logic->model->db()];
            $key = $model->getPk() ?? 'id';
            if (isset($data[$key]) && $data[$key]) $model->where([$key => $data[$key]]);
            $model = $model->findOrEmpty();
            $model->delete();
            if($with){
                foreach($with as $item){
                    $model->{$item}()->wherePivot('delete_time is null')->update(['pivot.delete_time'=>date("Y-m-d H:i:s")]);
                }
            }
            return new Reply(0, [$key => $data[$key]]);
        } catch (Exception $e) {
            return new Reply($e->getCode() ?: 500, $e->getMessage());
        }
    }

}