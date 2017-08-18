<?php
namespace app\index\controller;
use think\Controller;
use think\Log;
use think\Cache;
use think\response\View;
class Auth extends Controller
{
    public function index()
    {
     Log::write("进来了",'log');
     $data=$this->fetchinfo();
     $dataObj=json_decode($data);
     $userinfo['openid']=$dataObj->openid;
     $userinfo['nickname']=$dataObj->nickname;
     $userinfo['headimgurl']=$dataObj->headimgurl;
     $view=new View();
     $view->assign('userinfo',$userinfo);
     $this->fetch('userinfo');
    }
    public function getcode()
    {
      
       if(isset($_GET['code']))
       {
           return $_GET['code'];
       }
    }
    public function fetchaccess()
    {
        if(empty(Cache::get('access_token')))
        {
            $code=$this->getcode();
            $appid=config('appkey');
            $appsecret=config('appsecret');
            $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appid&code=$code&grant_type=authorization_code";
            $HttpReq=new \wx\GetAccessToken($url);
            $data=$HttpReq->https_request();
            Log::write($data,'info');
            $acess_token=json_decode($data)->access_token;
            $openid=json_decode($data)->openid;
            $refreshtoken=json_decode($data)->refresh_token;
            Cache::set('access_token', $acess_token,7200);
            Cache::set('openid', $openid);
            Cache::set('refresh', $refreshtoken,7200);
            
           
        }
      
    }
    public function refreshtoken(){
      
       $refreshtoken=Cache::get('refresh');
       $appid=config('appkey');
       $url="https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=$appid&grant_type=refresh_token&refresh_token=$refreshtoken";
       try
       {
           $HttpReq=new \wx\GetAccessToken($url);
           $data=$HttpReq->https_request();
           return $data;
       }catch (\think\Exception $e)
       {
           
       }
    }
    public function fetchinfo()
    {
        $this->fetchaccess();
        $oppid=Cache::get('openid');
        $acesstoken=Cache::get('access_token');
        $url="https://api.weixin.qq.com/sns/userinfo?access_token=$acesstoken&openid=$oppid&lang=zh_CN";
        try {
            $HttpReq=new \wx\GetAccessToken($url);
            $data=$HttpReq->https_request();
            Log::write($data,'info');
            return $data;
        }catch (\think\Exception $e)
        {
            die($e->getMessage());
        }
    }
    
}