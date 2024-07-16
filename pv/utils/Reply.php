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

/**
 * @notes 流程控制类
 * @package pv\utils
 */
class Reply
{
    private int $code;
    private array|string $data;
    private string $msg;

    /**
     * @notes 实例化 Reply 对象
     * @param int $code
     * @param array|string $data_or_message
     */
    public function __construct(int $code, array|string $data_or_message = '')
    {
        $this->code = $code;
        if ($code === 0) {
            $this->data = $data_or_message ? (is_array($data_or_message) ? $data_or_message : (array)$data_or_message) : [];
        } else {
            $this->msg = $data_or_message;
        }
    }

    /**
     * @notes 返回状态是否成功
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->code === 0;
    }

    /**
     * @notes 返回 code 数据
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @notes 返回 data 数据
     * @return array|string
     */
    public function getData(): array|string
    {
        return $this->data;
    }

    /**
     * @notes 返回 msg 数据
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }
}