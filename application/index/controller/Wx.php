<?php
namespace app\index\controller;

class Wx {
    //将封装好的类放到自动加载的目录即可使用 数据库控制器进行路由解析自动注入 依赖注入 
    public function index(){
//         $token="Sjlovefxy1314";
//         $wx=new \wx\Wechat($token);
        
//         //进行处理即可
//        return  TOOKEN;
//         $appid="wxa6004b6ac642a970";
//         $appsecret="06473904b78f0c406c9ff8ec3562a6ff";
//         $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
//         $access=new \wx\GetAccessToken($url);
//         $data=$access->get_token();
//         $data_arr=json_decode($data);
//         $access_token=$data_arr->access_token;

        //将这个保存到memcached中并且设置有效时间
        //这些操作必须在所有的控制器需要进行token 控制器初始化的时候进行处理
        //mecached存放token 设置过期时间7200 每一次的前置初始化都要进行判断
    
    }
    //然后进行用户的信息处理 会员处理 加油卡的处理 优惠券的处理 子菜单的处理
    //接受请求 进行解析传递的数据 用封装好全局 进行接受服务器传递的 xml数据进行解析出
    
}