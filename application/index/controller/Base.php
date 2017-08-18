<?php
namespace app\index\controller;
use \think\Controller;
use think\Cache;
class Base extends Controller{
    /**
     * {@inheritDoc}
     * @see \think\Controller::_initialize()
     */
    protected function _initialize()
    {
        
        //这里初始化的时候应该先到file中获取如果存在没有过期就不需要执行重新生成
        if(empty(Cache::get('access'))){
            $appkey=config("appkey");
            $appsecret=config("appsecret");
            $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appkey&secret=$appsecret";
            $access=new \wx\GetAccessToken($url);
            $data=$access->https_request($url);
            $access_arr=json_decode($data);
            $access_str=$access_arr->access_token;
            Cache::set("access", $access_str,7200);
        }
        
       
        
    }

    
}