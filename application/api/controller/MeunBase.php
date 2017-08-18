<?php
namespace app\api\controller;
use think\Controller;
use think\Cache;
use think\Exception;
class MeunBase extends Controller
{
    /**
     * {@inheritDoc}
     * @see \think\Controller::_initialize()
     */
    protected function _initialize()
    {
        if(empty(Cache::get('token')))
        {
          $appid=config('appkey');
          $appsecret=config('appsecret');
          $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
          $AcessToken=new \wx\GetAccessToken($url);
          try {
              $data=$AcessToken->https_request();
              $dataObj=json_decode($data);
              $access_token=$dataObj->access_token;
              Cache::set('token', $access_token,7200);
             
          }catch (Exception $e){
              print ($e->getMessage());
          }
        
       
          
        }
    }

    
}