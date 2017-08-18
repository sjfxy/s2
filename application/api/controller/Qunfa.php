<?php
namespace app\api\controller;
use think\Cache;
class Qunfa extends MeunBase
{
    //上传图文消息内的图片
    function uploadimg()
    {
        //http://mmbiz.qpic.cn/mmbiz_jpg/3BFfAdbXa439YRkbibEEjliaTWcL4xSicQ1l6fjX4hWXmYsynEkRN34ZfDe32e0knwuyvpn9bgHJpjfG5LHIicbpiaQ/0?wx_fmt=jpeg
        //{"media_id":"YVJs93K9x6dLATMuT3M-FcivjPwtRdipBp5DlJFEVkM","url":"http:\/\/mmbiz.qpic.cn\/mmbiz_jpg\/3BFfAdbXa439YRkbibEEjliaTWcL4xSicQ1l6fjX4hWXmYsynEkRN34ZfDe32e0knwuyvpn9bgHJpjfG5LHIicbpiaQ\/0?wx_fmt=jpeg"}
        //http://mmbiz.qpic.cn/mmbiz_jpg/3BFfAdbXa439YRkbibEEjliaTWcL4xSicQ1DkA1xBDf5XqAWEKRBkwgvOpEmLIibpjmpSiaVYTLmQCGGfHAYkFjklQw/0
        //http:\/\/mmbiz.qpic.cn\/mmbiz_jpg\/3BFfAdbXa40mBnFW7I1icDkRVLvb88nib9XlKHFMs1Z1VsSymVFKdTyTqc0HIfLvHMkTOHOZHPAkG5lzx5EPTVQQ\/0
        //url":"http://mmbiz.qpic.cn/mmbiz_jpg/3BFfAdbXa40mBnFW7I1icDkRVLvb88nib9XlKHFMs1Z1VsSymVFKdTyTqc0HIfLvHMkTOHOZHPAkG5lzx5EPTVQQ/0
        $token=Cache::get('token');
        //$url="https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=$token";
//         $str=file_get_contents('t.png');
//         $data = array("media" =>$str);
//         $img="@C:\AppServ\www\tp5\public\abc.png";
//         $data=array("media"=>$img);
//         try {
//             $HttpReq=new \wx\GetAccessToken($url);
//             $data=$HttpReq->https_request($data);
//            return $data;
//        }catch (\think\Exception $e)
//        {
//             print $e->getMessage();
//       }
      //HDrHlGcNInxN9ReZL7ofVxCrqNjUcZfP1OahcKcshoz2nsKInb6qKZ7k6mkq_UX6
    return view('upload',['token'=>$token]);
    }
    function geturl()
    {
        //获取用户信息
        $token=Cache::get('token');
        var_dump($token);
        die;
        $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$token&openid=owXtt0zZHQlVLktmGZ0oCATfpStY&lang=zh_CN";
        $HttpReq=new \wx\GetAccessToken($url);
        $data=$HttpReq->https_request();
        //file_put_contents('t.png', $data);
        return $data;
        
    }
    
    
}