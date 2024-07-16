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

use Exception;
use pv\dao\PvDeleteDao;
use pv\dao\PvSaveDao;
use pv\dao\PvSelectDao;
use pv\utils\Reply;
use think\Collection;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

/**
 * @notes 搜索条件处理器
 * @package pv\dao
 * @class BaseLogic
 *
 * --- 动态方法调用声明
 * @method Reply pvSave(string $callable= '', mixed $where = [])  增改
 * @method Reply pvDelete(array $with= '') 删除
 * @method Reply pvSelect(string $callable = '',array $with=[],array $where=[]) 查询
 **/
abstract class BaseLogic
{
    /**
     * @notes 模型注入
     * @var Model
     */
    public Model $model;

    /**
     * @notes 日志类型
     * @var string
     */
    protected string $logType;

    /**
     * @notes 日志名称
     * @var string
     */
    protected string $logName;

    /**
     * @notes 日志过滤
     * @var callable
     */
    public static $logCall;

    /**
     * @notes 获取主键
     * @return array|string
     */
    public function getPk(): array|string
    {
        return $this->model->getPk();
    }

    /**
     * @notes 查询获取一条指定条件的数据
     * @param array $where
     * @return array|mixed|Model
     */
    public function getOne(array $where = []): mixed
    {
        return $this->model->where($where)->findOrEmpty();
    }

    /**
     * @notes 获取一个符合条件的指定字段的值
     * @param array $where
     * @param string $field
     * @return mixed
     */
    public function getOneValue(string $field, array $where = []): mixed
    {
        return $this->model->where($where)->value($field);
    }

    /**
     * @notes 获取符合条件的指定字段的所有行集合
     * @param array $where
     * @param string $field
     * @return array
     */
    public function getOneColumns(string $field, array $where = []): array
    {
        return $this->model->where($where)->column($field);
    }

    /**
     * @notes 读取一条指定id的数据
     * @param $id
     * @return array|mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function read($id): mixed
    {
        return $this->model->find($id);
    }

    /**
     * @notes 批量新增或更新数据
     * @param $data
     * @return Collection
     * @throws Exception
     */
    public function saveAll($data): Collection
    {
        return $this->model->saveAll($data);
    }

    /**
     * @notes 获取条件数据中的某个字段的最大值
     * @param array $where
     * @param string $field
     * @return mixed
     */
    public function getMax(array $where = [], string $field = ''): mixed
    {
        return $this->model->where($where)->max($field);
    }

    /**
     * @notes 获取条件数据中的某个字段的最小值
     * @param array $where
     * @param string $field
     * @return mixed
     */
    public function getMin(array $where = [], string $field = ''): mixed
    {
        return $this->model->where($where)->min($field);
    }

    /**
     * @notes 多对多关联模型数据更新
     * @param $model
     * @param $with
     * @return Reply
     */
    public function saveWith($model,$with): Reply
    {
        try {
            //判断是否有提交关联模型字段，如果没有提交，则不进行关联操作
            if(!isset($model->{$with['postField']})) return new Reply(0);

            if(empty($model->{$with['postField']})) {
                //如果关联模型字段值为空，则关联数据全部删除
                $model->{$with['func']}()->wherePivot('delete_time is null')->update(['pivot.delete_time'=>date("Y-m-d H:i:s")]);
            }else{
                //关联数据更新 ---中间表开启软删除的时候，关联删除会失效
                $res=$model->{$with['func']}()->sync($model->{$with['postField']});
                //手动删除（软删除）关联表数据
                if(!empty($res['detached'])) $model->{$with['func']}()->wherePivot($with['withField'],'in',$res['detached'])->update(['pivot.delete_time'=>date("Y-m-d H:i:s")]);
            }
            return new Reply(0);
        } catch (Exception $e) {
            return new Reply($e->getCode() ?: 500, $e->getMessage());
        }
    }

    /**
     * @notes 调用魔术方法
     * @param string $method 方法名称
     * @param array $args 调用参数
     * @return $this|false|mixed
     */
    public function __call(string $method, array $args)
    {
        $hooks = [
            'pvSave' => [PvSaveDao::class, 'handle'],
            'pvDelete' => [PvDeleteDao::class, 'handle'],
            'pvSelect' => [PvSelectDao::class, 'handle'],
        ];
        if (isset($hooks[$method])) {
            [$class, $method] = $hooks[$method];
            return invoke($class)->$method($this, ...$args);
        } else {
            return call_user_func_array($method, $args);
        }
    }

    /**
     * @notes 数据回调处理机制
     * @param string $name 回调方法名称
     * @param mixed|array $one 回调引用参数1
     * @param mixed|array $two 回调引用参数2
     * @param mixed|array $thr 回调引用参数3
     * @return array|object|bool|string
     */
    public function callback(string $name, array|object $one = [], array $two = [], array $thr = []): mixed
    {
//        if (is_callable($name)) return call_user_func($name, $this, $one, $two, $thr);
        if (method_exists($this, $name)) {
            $res = $this->$name($one, $two, $thr);
            if ($res->getCode()) {
                return $res->getMsg();
            } else {
                return $res->getData();
            }
        }
        return true;
    }
}