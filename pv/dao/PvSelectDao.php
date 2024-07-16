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
use pv\trait\ListsSearchTrait;
use pv\trait\ListsSortTrait;
use pv\utils\Reply;

class PvSelectDao extends BaseDao
{
    use ListsSearchTrait;
    use ListsSortTrait;

    /**
     * @notes 列表排序
     * @var array
     */
    public array $sortOrder = [];

    /**
     * @notes 搜索条件
     * @var array
     */
    private array $searchWhere = [];
    /**
     * @notes 是否分页 默认1分页 0不分页
     * @var int
     */
    protected int $pageType = 1;
    /**
     * @notes 不分页，最大数据查询数量
     * @var int
     */
    protected int $pageSizeMax;
    /**
     * @notes 页数
     * @var int
     */
    protected int $pageNo;
    /**
     * @notes 每页数据量
     * @var int
     */
    protected int $pageSize;
    /**
     * @notes limit查询offset
     * @var int
     */
    public int $offset;
    /**
     * @notes limit查询length
     * @var int
     */
    public int $length;

    /**
     * @notes 查询数据
     * @param BaseLogic $logic 业务逻辑类
     * @param string $callable 回调函数
     * @param array $with 关联预加载配置
     * @param array $where 额外查询条件
     * @return Reply
     */
    public function handle(BaseLogic $logic, string $callable = '',array $with=[],array $where=[]): Reply
    {
        try {
            //分页初始化
            $this->initPage();
            //设置搜索条件
            $this->initSearch($logic->model->setSearchField);
            $this->initSort($logic->model->setSortField, $logic->model->setSortDefault);
            //初始化数据和模型
            [$data,$model]=[$this->params,$logic->model->db()];
            //关联预加载
            if($with) $model->with($with);
            //额外查询条件
            if($where) $model->where($where);
            //查询数据
            $list = $model->where($this->searchWhere)->limit($this->offset, $this->length)->order($this->sortOrder)->select();
            //统计数据
            $data['total'] = $model->getModel()->where($this->searchWhere)->count();
            //回调
            if ($callable && is_string($list = $logic->callback($callable, $list))) throw new exception($list);
            //返回列表
            $data['list'] = is_array($list) ? $list : $list->toArray();
            return new Reply(0, $data);
        } catch (Exception $e) {
            return new Reply($e->getCode() ?: 500, $e->getMessage());
        }
    }

    /**
     * @notes 初始化查询条件
     * @param array $search
     * @return array
     */
    private function initSearch(array $search = []): array
    {
        return $this->searchWhere = $this->createWhere($search);
    }

    /**
     * @notes 初始化排序
     * @param array $sortFields
     * @param array $sortDefault
     * @return array
     */
    private function initSort(array $sortFields = [], array $sortDefault = []): array
    {
        $this->field = $this->params['field'] ?? '';
        $this->orderBy = $this->params['order_by'] ?? '';
        return $this->sortOrder = $this->createOrder($sortFields, $sortDefault);
    }

    /**
     * @notes 初始化分页参数
     * @return void
     */
    private function initPage(): void
    {
        $this->pageSizeMax = config('query.page.page_size_max');
        $this->pageType = intval($this->params['page_type'] ?? config('query.page.page_type'));

        if ($this->pageType == 1) {
            //分页
            $this->pageNo = intval($this->params['page']?? config('query.page.page_no'));
            $this->pageSize = intval($this->params['size'] ?? config('query.page.page_size'));
        } else {
            //不分页
            $this->pageNo = 1;//强制到第一页
            $this->pageSize = $this->pageSizeMax;// 直接取最大记录数
        }

        //limit查询参数设置
        $this->offset = ($this->pageNo - 1) * $this->pageSize;
        $this->length = $this->pageSize;
    }
}