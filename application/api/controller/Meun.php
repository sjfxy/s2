<?php
namespace app\api\controller;
use think\Cache;
use think\Log;
class Meun extends MeunBase
{
    //创建菜单
    public function createmeun()
    {
       $access_token=Cache::get('token');
       $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$access_token";
      $body=' {
     "button":[
     {	
          "type":"view",
          "name":"个人中心",
          "url":"http://www.myriadintl.com/tp5/public/"
      },
          {	
          "type":"view",
          "name":"本月活动",
          "url":"http://www.baidu.com"
      },
          {	
          "type":"view",
          "name":"当日油价",
          "url":"http://promotion.bpsinopec.com/bp_wx_h5/user/menu.do"
      }
          ]
    }';
       try {
        
           $HttpReq=new \wx\GetAccessToken($url);
           $data=$HttpReq->https_request($body);
           $dataObj=json_decode($data);
//         var_dump($dataObj);
//            die;
           if($dataObj->errcode=='0'&&$dataObj->errmsg=='ok')
          {
            echo 'sucuess';  
          }
           
       }catch (\think\Exception $e){
           die($e->getMessage());
           
       }
    }
    //查询自定义菜单接口
    public function getmeun()
    {
        $access_token=Cache::get('token');
        $url="https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$access_token";
        try 
        {
          $HttpReq=new \wx\GetAccessToken($url);
          $data=$HttpReq->https_request();
          Log::write($data,'info');
          return $data;
        }catch (\think\Exception $e)
        {
            die($e->getMessage());
        }
    }
    //自定义菜单删除
    public function deletemeun()
    {
        $access_token=Cache::get('token');
        $url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=$access_token";
        try 
        {
           $HttpReq=new \wx\GetAccessToken($url);
           $data=$HttpReq->https_request();
           $dataObj=json_decode($data);
           if($dataObj->errcode=='0')
           {
              Log::write($data,'info');
           }
           //日志记录
         
        }catch (\think\Exception $e)
        {
            die($e->getMessage());
        }
        
    }
    //
}