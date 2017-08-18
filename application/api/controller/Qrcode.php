<?php
/**
 * 创建二维码控制器
 */
namespace app\api\controller;
use think\Cache;

class Qrcode extends MeunBase
{
   function create()
   {
   $access_token=Cache::get('token');
   $url="https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$access_token";
  $HttpReq=new \wx\GetAccessToken($url);
  //临时二维码的POST数据格式如下。
//   $post='{
//     "expire_seconds":1800,
//     "action_name":"QR_SCENE",
//     "action_info":{
//         "scene":{
//             "scene_id":100000
//         }
//     }
// }';
//整型永久二维码的POST数据格式如下。

//   $post='{
//     "action_name":"QR_LIMIT_SCENE",
//     "action_info":{
//         "scene":{
//             "scene_id":123
//         }
//     }
// }';

  //字符串型永久二维码的POST数据格式如下。
  
  
  $post='{
    "action_name":"QR_LIMIT_STR_SCENE",
    "action_info":{
        "scene":{
            "scene_str":"123"
        }
    }
}';
  $data=$HttpReq->https_request($post);
  $dataObj=json_decode($data);
  $ticket=$dataObj->ticket;
  
  $url=$dataObj->url;
  $Qr=new \qr\QRcode();
  $Qr::png($url,'sfy.png','',10);
  //就是这样的方便

//   $url="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
//   $HttpReq=new \wx\GetAccessToken($url);
//   $res=$HttpReq->https_request();
//   file_put_contents('t.png', $res);
  
  //上面是利用 ticket 获取的二维码
   }
   //批量生成二维码
   public function batchcode()
   {
       $access_token=Cache::get('token');
       for ($i=0;$i<=8;$i++)
       {
           $scene_id = $i;
           $qrcode = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": '.$scene_id.'}}}';
           $url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$access_token";
           $HttpReq=new \wx\GetAccessToken($url);
           $data=$HttpReq->https_request($qrcode);
           $dataObj=json_decode($data);
           $url=$dataObj->url;
           $Qr=new \qr\QRcode();
           $Qr::png($url,"qrcode".$scene_id.".png",'',5);
           
       }
   }
}