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

use Exception;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use think\facade\Env;

class JwtAuth
{
    /**
     * @notes key
     * @var string|mixed
     */
    protected string $key;

    /**
     * @notes data
     * @var array
     */
    public array $data;

    /**
     * @notes data
     * @var string
     */
    public string $payload;

    /**
     * @notes 错误信息
     * @var string
     */
    public string $error;
    
    /**
     * @notes token
     * @var string
     */
    public string $token;

    /**
     * @notes constructor
     */
    public function __construct()
    {
        $this->key = Env::get('TOKEN_KEY');
    }

    /**
     * @notes 生成token
     * @param $data
     * @param int $exp_time
     * @return string
     */
    public function getToken($data, int $exp_time = 3600): string
    {
        $host = app()->request->host();
        $time = time();

        $payload = [
            'iss' => $host,
            'aud' => $host,
            'iat' => $time,
            'nbf' => $time,
            'exp' => $time + $exp_time,
            'data' => $data
        ];
        return JWT::encode($payload, $this->key, 'HS256');
    }

    /**
     * @notes 验证token
     * @param $token
     * @return bool
     */
    public function verifyToken($token): bool
    {
        try {
            //当前时间减去60，把时间留点余地
            JWT::$leeway = 60;
            $decoded =(array) JWT::decode($token, new Key($this->key, 'HS256'));
            $this->payload = json_encode($decoded);
            $this->data=(array)$decoded['data'];
            return true;
        } catch (SignatureInvalidException $e) {
            //签名不正确
            $this->error = $e->getMessage();
            return false;
        } catch (BeforeValidException $e) {
            // 签名在某个时间点之后才能用
            $this->error = $e->getMessage();
            return false;
        } catch (ExpiredException $e) {
            //token过期
            $this->error = $e->getMessage();
            return false;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @notes 重新生成并返回token
     * @param $token
     * @return bool
     */
    public function refreshToken($token): bool
    {
        if (empty($token)) {
            $this->error = lang(strval(10002));
            return false;
        }
        if ($this->verifyToken($token)) {
            $arr = json_decode($this->payload, true);
            $this->token = $this->getToken($arr['data']);
            return true;
        } else {
            return false;
        }
    }
}