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
namespace app\backstage\logic;

use pv\model\Staff;
use pv\basic\BaseLogic;
use think\Response\Json;

class LoginLogic extends BaseLogic
{
    /**
     * @notes constructor
     * @param Staff $model
     */
    public function __construct(Staff $model){
        $this->model = $model;
    }

    /**
     * @notes 登录
     * @param $params
     * @return Json
     */
    public function index($params): Json
    {
        $userModel=$this->model->with(['roles'=>function($query){
            $query->where('pivot.delete_time is null');
        }])->where('username',$params['username'])->findOrEmpty();
        $userRoleArr=$userModel->roles->toArray();
        //生成token
        $access_token_exp_time = 3600;
        $refresh_token_exp_time = 21600;
        $tokenData['id'] = $userModel->id;
        $tokenData['username'] = $userModel->username;
        $tokenData['role_ids']=array_column($userRoleArr,'id');
        //返回信息
        $arr['roles']=array_column($userRoleArr,'code');
        $arr['username'] = $userModel->username;
        $arr['accessToken'] = app('jwt')->getToken($tokenData, $access_token_exp_time);
        $arr['refreshToken'] = app('jwt')->getToken($tokenData, $refresh_token_exp_time);
        $arr['expires'] = date('Y-m-d H:i:s', strtotime('+ ' . $access_token_exp_time . ' seconds'));
        return resultJson($arr);
    }

    /**
     * @notes 刷新token
     * @param $refreshToken
     * @return Json
     */
    public function refreshToken($refreshToken): Json
    {
        if (app('jwt')->refreshToken($refreshToken)) {
            $arr['accessToken'] = app('jwt')->token;
            $arr['refreshToken'] = $refreshToken;
            $arr['expires'] = date('Y-m-d H:i:s', strtotime('+3600 seconds'));
            return resultJson($arr);
        } else {
            return resultJson(app('jwt')->error,0);
        }
    }
}