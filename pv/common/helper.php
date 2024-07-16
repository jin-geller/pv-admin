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
// 应用公共文件
use think\facade\Lang;
use think\Response\Json;

if (!function_exists('p')) {
    /**
     * @notes 调试方法
     * @param $data
     * @param int $die
     * @return void
     */
    function p($data, int $die = 1): void
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        if ($die) {
            die();
        }
    }
}

if (!function_exists('isJson')) {
    /**
     * @notes 判断字符串是否为json类型
     * @param $string
     * @return bool
     */
    function isJson($string): bool
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

if (!function_exists('resultJson')) {
    /**
     * @notes 返回json数据
     * @param int|array|string|null $data_or_msg
     * @param int $status 返回数据或者错误信息  默认1数据 0错误信息
     * @param int $code http status code
     * @return Json
     */
    function resultJson(int|array|string $data_or_msg = null, int $status = 1, int $code = 0): Json
    {
        $json = app('json');
        if ($code) {
            $json->code($code);
        }
        if ($status) {
            return $json->success($data_or_msg);
        } else {
            return $json->fail($data_or_msg);
        }
    }
}

//if (!function_exists('lang')) {
//    /**
//     * 获取语言变量值
//     * @param int|string $name 语言变量名
//     * @param array $vars 动态变量值
//     * @param string $lang 语言
//     * @return mixed
//     */
//    function lang(int|string $name, array $vars = [], string $lang = ''): mixed
//    {
//        return Lang::get($name, $vars, $lang);
//    }
//}

if (!function_exists('arrayToTree')) {
    /**
     * @notes 一维数组转为树形结构
     * @param array $array
     * @param int $pid 上级key值
     * @param string $idField key名称
     * @param string $parentIdField 上级key名称
     * @param string $childrenField 下级数据数组名称
     * @param string $metaField 前端使用字段数组名称
     * @return array
     */
    function arrayToTree(array $array, int $pid = 0, string $idField = 'id', string $parentIdField = 'parentId', string $childrenField = 'children', string $metaField = 'meta'): array
    {
        $tree = [];
        //parentId集合
        $parentIdArr = array_flip(array_column($array, $parentIdField));
        //前端菜单mete包含字段
        $metaKeys = array_flip(config('app.' . $metaField));
        foreach ($array as $item) {
            $change = $item;
            foreach ($metaKeys as $key => $value) {
                if (isset($change[$key])) {
                    $change[$metaField][$key] = $change[$key];
                    unset($change[$key]);
                }
            }
            //第一次循环，判断当前菜单是否为顶级菜单
            //递归循环，判断当前菜单是否为指定菜单的子级
            if ($item[$parentIdField] == $pid) {
                //判断当前数据是否有子级，如果有，则取出子级
                if (isset($parentIdArr[$item[$idField]])) {
                    $childTree = arrayToTree($array, $item[$idField]);
                    //父级auths字段获取子级auth_code
                    foreach ($childTree as $child) {
                        if (isset($child['menuType']) && $child['menuType'] == 3 && isset($child[$metaField]['auth_code'])) {
                            $change[$metaField]['auths'][] = $child[$metaField]['auth_code'];
                        }
                    }
                    //只返回类型为菜单的子级
                    $childTree = array_filter($childTree, function ($child) {
                        return $child['menuType'] === 0;
                    });

                    //如果子级不为空，则设置父级children字段
                    if($childTree) $change[$childrenField] = $childTree;
                }
                //去除子级中rank字段 ---前端框架问题，导致子级加入rank值，路由跳转有问题
                if ($change[$parentIdField]) {
                    unset($change[$metaField]['rank']);
                }
                $tree[] = $change;
            }
        }
        return $tree;
    }
}

if(!function_exists('getBrowser')){
    /**
     * @notes 获取客户端的浏览器信息
     * @return string
     */
    function getBrowser(): string
    {
        $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $browser = "Unknown Browser";

        $browsers = [
            'opera' => 'Opera',
            'edge\/' => 'Microsoft Edge',
            'trident\/7.0;.*rv:11.0' => 'Microsoft Internet Explorer 11',
            'msie' => 'Microsoft Internet Explorer',
            'chrome.*safari' => 'Google Chrome',
            'chrome.*crios' => 'Chrome (iOS)',
            'safari' => 'Safari',
            'firefox' => 'Mozilla Firefox',
            'trident' => 'Internet Explorer',
            'vivaldi' => 'Vivaldi',
            'ucbrowser' => 'UC Browser'
        ];

        foreach ($browsers as $pattern => $name) {
            if (preg_match("/".$pattern."/i", $user_agent)) {
                $browser = $name;
                break;
            }
        }

        return $browser;
    }
}

if(!function_exists('getOs')){
    /**
     * @notes 获取客户端的操作系统
     * @return string
     */
    function getOs(): string
    {
        $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $os_platform = "Unknown OS";

        $oses = [
            'windows|win32' => 'Windows',
            'macintosh|mac os x' => 'Mac',
            'linux' => 'Linux',
            'android' => 'Android',
            'iphone|ipad|ipod' => 'iOS'
        ];

        foreach ($oses as $pattern => $name) {
            if (preg_match("/".$pattern."/i", $user_agent)) {
                $os_platform = $name;
                break;
            }
        }

        return $os_platform;
    }
}

if(!function_exists('getIpAddress')){
    /**
     * @notes 根据ip地址获取归属地->国家、省、市、地区等等
     * @param $ip
     * @return string
     * @throws Exception
     */
    function getIpAddress($ip): string
    {
        return (new Ip2Region())->simple($ip);
    }
}

if(!function_exists('flattenArray')){
    /**
     * @notes 多维数组中提取所有的键值对并组成一个新的数组
     * @param array $array
     * @return array
     */
    function flattenArray(array $array): array
    {
        $result = [];
        array_walk_recursive($array, function ($value, $key) use (&$result) {
            $result[$key] = $value;
        });
        return $result;
    }
}

if(!function_exists('searchFieldsTrans')){
    /**
     * @notes 搜索字段重组---返回给前端使用
     * @param array $fieldArr
     * @param array $choicesArr
     * @return array
     */
    function searchFieldsTrans(array $fieldArr, array $choicesArr=[]): array
    {
        $fieldArr=flattenArray($fieldArr);
        return array_map(function($key, $value) use($choicesArr) {
            return ['key' => $key, 'input_type' => $value,'choices' => $choicesArr[$key]??[]];
        }, array_keys($fieldArr), $fieldArr);
    }
}

if(!function_exists('arrayLabelValue')){
    /**
     * @notes 将一维数组转为 [[label=>value,value=>key]] 格式的二维数组
     * @param array $arr
     * @return array
     */
    function arrayLabelValue(array $arr): array
    {
        return array_map(function($value, $key) {
            return ['label' => $value, 'value' => $key];
        }, $arr, array_keys($arr));
    }
}