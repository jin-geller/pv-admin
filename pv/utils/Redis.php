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

namespace pv\utils;

use Predis\Client;

class Redis
{
    /**
     * @notes redis
     * @var Client
     */
    private Client $redis;

    public function __construct($parameters = [])
    {
        if (empty($parameters)) {
            $parameters = config('cache.stores.redis');
        }
        $this->redis = new Client($parameters);
    }

    /**
     * @notes 获取redis实例
     * @return Client
     */
    public static function getInstance(): Client
    {
        return (new self())->redis;
    }

    /**
     * @notes __call
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->redis, $method], $args);
    }


    /**
     * @notes __destruct
     */
    public function __destruct()
    {
        $this->redis->quit();
    }

    /**
     * @notes __clone
     * @return void
     */
    private function __clone()
    {
    }
}