<?php
namespace app\api\controller;
use think\View;
use think\Controller;
use think\db;
use think\Cache;
use think\cache\driver\Memcache;
use think\Request;
class User extends MeunBase{
    function index($openid,$access_token)
    {
        Cache::set('openid', $openid,7200);
        file_put_contents('demo.txt', "openid；".$openid."access_token:".$access_token,FILE_APPEND);
        if(!empty($openid)&&!empty($access_token))
        {
         
         $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";;
         $HttpReq=new \wx\GetAccessToken($url);
         $ReqData=$HttpReq->https_request();
         $ReqObj=json_decode($ReqData);
         $data=array();
         $data['openid']=$ReqObj->openid;
         $data['nickname']=$ReqObj->nickname;
         $data['sex']=$ReqObj->sex;
         $data['city']=$ReqObj->city;
         $data['province']=$ReqObj->province;
         $data['country']=$ReqObj->country;
         $data['headimgurl']=$ReqObj->headimgurl;
       // Db::table("userinfo")->insert($data);
          //$this->send();
         return view('user',$data);
        }
    }
    
   //第二版本 如果是网页授权过后回调的脚本 获得code access_token userinfo insertdb 的话  
   function index2($openid)
   {
       $where=array('openid'=>$openid);
       $res=Db::table('userinfo')->field('mobile')->where($where)->find();
       if(!isset($res))
       {
          //如果根据这个用户的openid查询数据库如果用户没有注册的话
          
          //这里为什么不用seesion的原因是 1.过多使用影响服务性能 2.这个是基于手机客户端 用户不可能像打开Web页面那样 在手机公众号停留
          //3.场景不合适 因为当用户已经注册过后第二次进行公众号如果是seesion是发呆时间 是存放在我们服务器 当有请求时 就刷新seesion时间
          //但是用户不可能保证不会超过seesion过期时间 如果seesion过期 这个时候你还要用户进行登录或者注册肯定不可能的所以这里只能
          //保存到数据库中 永久的保存 如果数据库没有就注册 如果有 就从memcached中取出用户数据 如果memcached中没有 就根据openid取出信息
          $this->redirect('api/user/register',['openid'=>$openid]);
       }
     
       $options = [
           'host'       => '127.0.0.1',
           'port'       => 11211,
           'expire'     => 0,
           'timeout'    => 0, // 超时时间（单位：毫秒）
           'persistent' => true,
           'prefix'     => '',
       ];
      $me=new Memcache($options);
      $userinfo=$me->get('userinfo');
      if(!empty($userinfo))
      {
          return view('user',$userinfo);
      }else 
      {
        //根据openid查询数据库
        $fields=array();//根据页面情况进行取出合适的字段
        $userinfo=Db::table('userinfo')->field($fields)->where("openid=$openid")->find();
        $me->set('userinfo', $userinfo);
        return view('user',$userinfo);
      }
      
   }
    //具体的流程是这样的
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
      
       
    }
    //会员中心 我的购物卡 卡券 这些会进行网页 只要涉及到获取用户信息 因为获取用户信息每天500000次
    //oauth2.php ->openid access_token  
    //这个回调脚本我只负责转发用户的openid access_token 上述的脚本
    //首先根据用户openid查询数据库如果没有值 就调用 获取用户信息的接口 将用户信息保存到数据库
    //保存成功 取出用户数据 
    function login()
    {
        
    }
    function register($id)
    {
     //这里是注册
     if(Request::instance()->isPost())
     {
        $mobile=input('post.mobile');
        //这里调用的是第三方的短信验证的接口
        //根据接口 发出接口 根据返回的结果进行判断
        //如果正确
        //将手机号 mobile openid 进行保存数据库
        //之后取出数据库用户信息(由于注册的次数只有一次) memcached不适合
        //调用微信公众号客服接口 向注册成功的用户发送卡券信息图文或者其他信息
        //跳转到 渲染视图页面
     }
    
    }
    function test()
    {
   //$this->redirect('user/user/login',['openid'=>3]);
   //$this->redirect('api/user/register',['id'=>22]);
        $options = [
            'host'       => '127.0.0.1',
            'port'       => 11211,
            'expire'     => 0,
            'timeout'    => 0, // 超时时间（单位：毫秒）
            'persistent' => true,
            'prefix'     => '',
        ];
        $me=new \think\cache\driver\Memcache($options);
        //$me->set('sj', 'ss',3600);
        echo $me->get('sj');
    }
    //就是当用户注册成功之前都是通过网页授权 将用户的openid access_token
    //
}