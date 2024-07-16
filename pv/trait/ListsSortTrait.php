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
namespace pv\trait;

trait ListsSortTrait
{

    protected string $orderBy;
    protected string $field;

    /**
     * @notes 生成排序条件
     * @param array $sortFields
     * @param array $sortDefault
     * @return array
     */
    private function createOrder(array $sortFields = [], array $sortDefault = []): array
    {
        if (empty($sortFields) || empty($this->orderBy) || empty($this->field) || !in_array($this->field, array_keys($sortFields))) {
            return $sortDefault;
        }

        if (isset($sortFields[$this->field])) {
            $field = $sortFields[$this->field];
        } else {
            return $sortDefault;
        }

        if ($this->orderBy == 'desc') {
            return [$field => 'desc'];
        }
        if ($this->orderBy == 'asc') {
            return [$field => 'asc'];
        }
        return $sortDefault;
    }
}