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

namespace pv\middleware;

use Closure;
use think\Request;
use think\Response;
use pv\utils\JwtAuth;

class AuthToken
{
    /**
     * @notes 路由白名单
     */
    const DONT_CHECK_ROUTE = [
        'register',
        'admin/login/refresh_token',
        'admin/login/index'
    ];
    /**
     * @notes 错误信息
     * @var string
     */
    private string $error;

    /**
     * @notes 处理请求
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 检验是否需要验证Token
        if ($this->ifValidate($request)) {
            $authorization = $request->header()['authorization'] ?? null;
            if ($authorization && $this->checkToken($authorization,$request)) {
                // 验证通过，继续执行下一个中间件或控制器
                return $next($request);
            } else {
                // 验证未通过，返回拒绝访问的响应
                return resultJson($this->error ?? lang('10000'), 0);
            }
        }
        return $next($request);
    }

    /**
     * @notes 检验是否需要验证
     * @param $request
     * @return bool
     */
    protected function ifValidate($request): bool
    {
        $url= trim($request->url(), "/");
        if (in_array($url, self::DONT_CHECK_ROUTE)) {
            return false;
        }
        return true;
    }

    /**
     * @notes Token验证
     * @param $authorization
     * @param $request
     * @return bool
     */
    protected function checkToken($authorization, $request): bool
    {
        $authorization = trim(str_replace('Bearer', '', $authorization));
        if ($authorization !== 'undefined') {
            $jwt = app()->make(JwtAuth::class);
            if (!$jwt->verifyToken($authorization)) {
                $this->error = $jwt->error;
                return false;
            }
            $request->userInfo=$jwt->data;
        } else {
            $this->error = lang('10001');
            return false;
        }
        return true;
    }
}
