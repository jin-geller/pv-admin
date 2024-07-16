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
use think\Cache;

class BaseCache extends Cache
{
    /**
     * @notes 缓存标签
     * @var string
     */
    protected string $tagName;

    public function __construct(){
        parent::__construct(app());
        $this->tagName =get_class($this);
    }

    /**
     * @notes 设置缓存,重写父类set,自动设置标签
     * @param $key
     * @param $value
     * @param $ttl
     * @return bool
     */
    public function set($key, $value, $ttl=null): bool
    {
      return  $this->store()->tag($this->tagName)->set($key, $value,$ttl);
    }

    /**
     * @notes 清除当前缓存类所有缓存
     * @return bool
     */
    public function delTag(): bool
    {
        return $this->tag($this->tagName)->clear();
    }
}