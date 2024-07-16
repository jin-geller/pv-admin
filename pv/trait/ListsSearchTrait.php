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
trait ListsSearchTrait
{
    /**
     * @notes 搜索条件生成
     * @param array $search
     * @return array
     */
    private function createWhere(array $search = []): array
    {
        if (empty($search)) {
            return [];
        }
        $where = [];
        foreach ($search as $whereType => $whereFields) {
            switch ($whereType) {
                case '=':
                case '<>':
                case '>':
                case '>=':
                case '<':
                case '<=':
                case 'in':
                    foreach ($whereFields as $whereField=>$whereValue) {
                        if (!isset($this->params[$whereField]) || $this->params[$whereField] == '') {
                            continue;
                        }
                        $where[] = [$whereField, $whereType, $this->params[$whereField]];
                    }
                    break;
                case '%like%':
                    foreach ($whereFields as $whereField=>$whereValue) {
                        if (!isset($this->params[$whereField]) || empty($this->params[$whereField])) {
                            continue;
                        }
                        $where[] = [$whereField, 'like', '%' . $this->params[$whereField] . '%'];
                    }
                    break;
                case '%like':
                    foreach ($whereFields as $whereField=>$whereValue) {
                        if (!isset($this->params[$whereField]) || empty($this->params[$whereField])) {
                            continue;
                        }
                        $where[] = [$whereField, 'like', '%' . $this->params[$whereField]];
                    }
                    break;
                case 'like%':
                    foreach ($whereFields as $whereField=>$whereValue) {
                        if (!isset($this->params[$whereField]) || empty($this->params[$whereField])) {
                            continue;
                        }
                        $where[] = [$whereField, 'like', $this->params[$whereField] . '%'];
                    }
                    break;
                case 'between':
                    foreach ($whereFields as $whereField=>$whereValue) {
                        if (!isset($this->params[$whereField]) || $this->params[$whereField] == '') {
                            continue;
                        }
                        $where[] = [$whereField, $whereType, [$this->params[$whereField][0], $this->params[$whereField][1]]];
                    }
                    break;
                case 'find_in_set':
                    foreach ($whereFields as $whereField=>$whereValue) {
                        if (!isset($this->params[$whereField]) || $this->params[$whereField] == '') {
                            continue;
                        }
                        $where[] = [$whereField, 'find in set', $this->params[$whereField]];
                    }
                    break;
            }
        }
        return $where;
    }
}
