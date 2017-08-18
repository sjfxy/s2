<?php
/**
 * 客服管理接口
 */
namespace app\api\controller;
use think\Cache;
use think\Exception;
use think\Log;
class Customerservice extends MeunBase
{
    //添加客服账号
  function add()
  {
  $token=Cache::get('token');
  $url="https://api.weixin.qq.com/customservice/kfaccount/add?access_token=$token";
  $HttpReq=new \wx\GetAccessToken($url);
  $post='{
    "kf_account":"test1@wedlinux",
    "nickname":"客服1"
}';
  try 
  {
      $data=$HttpReq->https_request($post);
      $data_arr=json_decode($data,true);
      if($data_arr['errcode']=='0'||$data_arr['errmsg']=='ok')
      {
          return $data_arr;
      }else 
      {
      Log::write("add failed",'notice');  
      }
  }catch (Exception $e)
  {
     print ($e->getMessage()); 
  }
  //这里必须是开通过客服的功能
  }
  
  //获取客服列表
  function fetchlist()
  {
      $token=Cache::get('token');
      $url="https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token=$token";
      $HttpReq=new \wx\GetAccessToken($url);
      try 
      {
         $data=$HttpReq->https_request();
         return $data;
         
      }catch (Exception $e)
      {
      print ($e->getMessage());    
      }
  }
  //获取在线客服
  function fetchonlinelist()
  {
      $token=Cache::get('token');
      $url="https://api.weixin.qq.com/cgi-bin/customservice/getonlinekflist?access_token=$token";
      $HttpReq=new \wx\GetAccessToken($url);
      try
      {
          $data=$HttpReq->https_request();
          return $data;
           
      }catch (Exception $e)
      {
          print ($e->getMessage());
      }
  }
  //邀请绑定客服帐号
  
  function inviteworker()
  {
      $token=Cache::get('token');
      $url="https://api.weixin.qq.com/customservice/kfaccount/inviteworker?access_token=$token";
      //这里调用上面的获取的在线客服信息取出想要的结果参数
      //$this->fetchlist();
      //$this->fetchonlinelist();
      $post="";
      $HttpReq=new \wx\GetAccessToken($url);
      try
      {
       $data=$HttpReq->https_request($post);
       $data_arr=json_decode($data,true);
      if($data_arr['errcode']=='0'||$data_arr['errmsg']=='ok')
      {
          return $data_arr;
      }else 
      {
      Log::write("add failed",'notice');  
      }
  }catch (Exception $e)
  {
     print ($e->getMessage()); 
  }
  
}

//设置客服信息

function update()
{
    $token=Cache::get('token');
    $url="https://api.weixin.qq.com/customservice/kfaccount/update?access_token=$token";
    $post="";
    $HttpReq=new \wx\GetAccessToken($url);
    try
    {
        $data=$HttpReq->https_request($post);
        $data_arr=json_decode($data,true);
        if($data_arr['errcode']=='0'||$data_arr['errmsg']=='ok')
        {
            return $data_arr;
        }else
        {
            Log::write("add failed",'notice');
        }
    }catch (Exception $e)
    {
        print ($e->getMessage());
    }
}
//上传客服头像
  function uploadheadimg()
  {
      //这个是获取客服信息
      //点击显示个人信息
      //点击上传表单头像
      //post 地址 拼接对应的模板即可
      //调用sholist 视图渲染
      $token=Cache::get('token');
      $url="https://api.weixin.qq.com/customservice/kfaccount/update?access_token=$token";
  }
  //这个就完全是后台的基本操作
}