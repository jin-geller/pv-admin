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
namespace pv\common\event;

use pv\model\Staff;
use pv\model\StaffLogin;
use Exception;
use think\facade\Log;

class StaffLoginEvent
{
    /**
     * @notes 登录验证后置事件---登录日志
     * @throws Exception
     */
    public function handle($data): void
    {
        try{
            $ip=request()->ip();
            //登录日志
            $loginModel = new StaffLogin;
            $loginModel->staff_id=$data['staff_id'];
            $loginModel->ip=$ip;
            $loginModel->address=getIpAddress($ip);
            $loginModel->os=getOs();
            $loginModel->browser=getBrowser();
            $loginModel->user_agent=$_SERVER['HTTP_USER_AGENT'];
            $loginModel->type=$data['type'];
            $loginModel->save();

            //登录成功，更新最后登录时间和ip地址
            if($data['type']===StaffLogin::TYPE_SUCCESS){
                $userModel=(new Staff())->find($data['staff_id']);
                $userModel->last_time=date('Y-m-d H:i:s');
                $userModel->last_ip=$ip;
                $userModel->save();
            }
        }catch (Exception $e){
            Log::info('StaffLoginEvent Error:'.$e->getMessage());
        }
    }
}