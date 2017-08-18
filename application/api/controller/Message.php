<?php
namespace app\api\controller;
use think\Cache;
class Message extends MeunBase
{
    function send()
    {
        file_put_contents('gx.txt',"ss");
       $access_token=Cache::get('token');
       $url="https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=$access_token";
       $openid=Cache::get('openid');
      $data = '{
    "touser":"'.$openid.'",
    "msgtype":"text",
    "text":
    {
         "content":"Hello World"
    }
}';
      $HttpRequ=new \wx\GetAccessToken($url);
      $res=$HttpRequ->https_request($data);
      file_put_contents('gx.txt',$res,FILE_APPEND);
      var_dump($res);
       
    }
}