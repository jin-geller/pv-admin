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

class PvSaveDao extends baseDao
{
    /**
     * 单条数据增量保存
     * @param BaseLogic $logic
     * @param string $callable
     * @param array $with
     * @param array $where
     * @return Reply
     */
    public function handle(BaseLogic $logic, string $callable = '', array $with= [],array $where=[]): Reply
    {
        try {
            [$data,$model]=[$this->params,$logic->model->db()];
            $key = $model->getPk() ?? 'id';
            if (isset($data[$key]) && $data[$key]) $model->where([$key => $data[$key]]);
            $model = $model->where($where)->findOrEmpty();
            if ($model->save($data) === false) throw new exception('Save failed');
            if($callable){
                if($with){
                    $res=$logic->callback($callable, $model,$with);
                }else{
                    $res=$logic->callback($callable, $model);
                }
                if(is_string($res)) throw new exception($res);
            }
            return new Reply(0, $model->toArray());
        } catch (Exception $e) {
            return new Reply($e->getCode() ?: 500, $e->getMessage());
        }
    }
}