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
namespace pv\common\validate;

use pv\model\Staff;
use pv\model\StaffLogin;
use pv\basic\BaseValidate;
use pv\common\cache\LoginSafeCache;
use think\facade\Event;

class LoginValidate extends BaseValidate
{
    /**
     * @notes 验证规则
     * @var string[]
     */
    protected $rule=[
        'username'=>'require',
        'password'=>'require|password',
    ];
    /**
     * @notes 自定义提示消息
     * @var string[]
     */
    protected $message=[
        'username.require'=>'请输入账号！',
        'password.require'=>'请输入密码！',
    ];

    /**
     * @notes 密码验证规则
     * @param $password
     * @param $rule
     * @param $data
     * @return bool|string
     */
    public function password($password,$rule,$data): bool|string
    {
        $loginSafeCache=new LoginSafeCache();
        //后台账号安全机制，连续输错后锁定，防止账号密码暴力破解
        if (!$loginSafeCache->isSafe()) {
            return '账号或密码连续' . $loginSafeCache->count . '次输入错误，请' . $loginSafeCache->minutes . '分钟后重试！';
        }

        $userInfo= (new Staff())->where('username', $data['username'])
            ->field(['id','password','status'])
            ->findOrEmpty();

        if ($userInfo->isEmpty() || empty($userInfo['password'])) {
            $loginSafeCache->record();
            return '账号不存！';
        }
        //员工id
        $data['staff_id']=$userInfo['id'];

        if($userInfo['status'] === 0){
            //账号被禁用
            $this->loginEvent(StaffLogin::TYPE_DISABLED,$data);
            return '账号已被禁用！';
        }

        if (!password_verify($password,$userInfo['password'])) {
            $loginSafeCache->record();
            //日志类型 1密码错误 3密码多次错误
            $type=$loginSafeCache->isSafe()?StaffLogin::TYPE_ERROR:StaffLogin::TYPE_MULTIPLE_ERROR;
            $this->loginEvent($type,$data);
            return '密码错误！';
        }

        $loginSafeCache->relieve();
        $this->loginEvent(StaffLogin::TYPE_SUCCESS,$data);
        return true;
    }

    /**
     * @notes 登录日志记录
     * @param $type
     * @param array $data
     * @return void
     */
    protected function loginEvent($type, array $data=[]): void
    {
        $data['type'] = $type;
        Event::trigger('StaffLoginEvent',$data);
    }
}