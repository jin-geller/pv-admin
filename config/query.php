<?php
// +----------------------------------------------------------------------
// | 应用设置
// +----------------------------------------------------------------------

return [
    //前端菜单mete包含字段---根据前端pureAdmin框架路由配置所设置
    'meta' => [
        'title',
        'icon',
        'extraIcon',
        'showLink',
        'showParent',
        'roles',
        'auths',
        'keepAlive',
        'frameSrc',
        'frameLoading',
        'hiddenTag',
        'dynamicLevel',
        'activePath',
        'rank'
    ],
    'page' => [
        'page_no' => 1,
        'page_size' => 15,
        'page_type' => 1,
        'page_size_max' => 25000,
    ]
];
