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

use think\Response;

class Json
{
    /**
     * @notes http默认状态码
     * @var int
     */
    private int $httpCode = 200;

    /**
     * @notes 设置状态码
     * @param $code
     * @return Json
     */
    public function code($code): self
    {
        $this->httpCode = $code;
        return $this;
    }

    /**
     * @notes 返回数据
     * @param $status
     * @param $code
     * @param array|string|null $data
     * @return Response
     */
    public function result($status, $code, array|string $data = null): Response
    {
        $res = match ($status) {
            200 => ['code' => $code, 'data' => $data],
            400 => ['code' => $code, 'error' => $data],
        };
        return Response::create($res, 'json', $this->httpCode);
    }

    /**
     * @notes 返回data
     * @param $code
     * @param array|null $data
     * @return Response
     */
    public function success($code, array $data = null): Response
    {
        if (!is_numeric($code)) {
            $data = $code;
            $code = 200;
        }
        return $this->result(200, $code, $data);
    }

    /**
     * @notes 返回错误信息
     * @param int|string $code
     * @return Response
     */
    public function fail(int|string $code): Response
    {
        if (is_numeric($code)) {
            $error = lang(strval($code));
        } else {
            $error = $code;
            $code = 400;
        }
        return $this->result(400, $code, $error);
    }
}