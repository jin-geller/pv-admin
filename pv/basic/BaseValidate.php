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

use pv\utils\Reply;
use think\exception\HttpResponseException;
use think\Validate;
class BaseValidate extends Validate {
    /**
     * @notes 检测请求方式是否为get
     * @return $this
     */
    public function get(): static
    {
        if(!$this->request->isGet()){
            throw new HttpResponseException(resultJson('请求方式有误，请使用 get 方式请求！',0));
        }
        return $this;
    }

    /**
     * @notes 检测请求方式是否为post
     * @return $this
     */
    public function post(): static
    {
        if(!$this->request->isPost()){
            throw new HttpResponseException(resultJson('请求方式有误，请使用 post 方式请求！',0));
        }
        return $this;
    }

    /**
     * @notes 切面验证接收到的参数
     * @param string $scene 验证场景
     * @param array $data 验证参数，可追加和覆盖掉接收的参数
     * @return array|Reply
     */
    public function toCheck(string $scene='', array $data=[]): array|Reply
    {
        $params = $this->request->param();
        $params=array_merge($params,$data);
        if($scene){
            $result=$this->scene($scene)->check($params);
        }else{
            $result=$this->check($params);
        }
        if(!$result){
            throw new HttpResponseException(resultJson($this->error,0));
        }
        return $params;
    }
}