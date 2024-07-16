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
namespace pv\common\cache;
use pv\basic\BaseCache;

class LoginSafeCache extends BaseCache
{
    /**
     * @notes 缓存次数名称
     * @var string
     */
    protected string $key;
    /**
     * @notes 设置连续输错次数，即 5 分钟内连续输错误 15 次后，锁定
     * @var int
     */
    public int $count=15;
    /**
     * @notes 缓存设置为 10 分钟，即密码错误次数达到，锁定 10 分钟
     * @var int
     */
    public int $minutes=10;

    public function __construct()
    {
        parent::__construct();
        $ip = $this->app->request->ip();
        $this->key = $this->tagName . $ip;
    }

    /**
     * @notes 记录登录错误次数
     * @return void
     */
    public function record(): void
    {
        if ($this->get($this->key)) {
            //缓存存在，记录错误次数
            $this->inc($this->key, 1);
        } else {
            //缓存不存在，第一次设置缓存
            $this->set($this->key, 1, $this->minutes * 60);
        }
    }

    /**
     * @notes 判断是否安全
     * @return bool
     */
    public function isSafe(): bool
    {
        $count = $this->get($this->key);
        if ($count >= $this->count) {
            return false;
        }
        return true;
    }

    /**
     * @notes 删除该ip记录错误次数
     * @return void
     */
    public function relieve(): void
    {
        $this->delete($this->key);
    }
}