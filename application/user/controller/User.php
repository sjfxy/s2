<?php
namespace app\user\controller;
use think\Controller;
use app\user\model\UserQv;
class User extends Controller{
    function index($id){
   file_put_contents('abc.text', $id,FILE_APPEND);
    }
    function login($openid)
    {
       echo $openid; 
    }
    function test(UserQv $userqv){
//        $data=[];
//        $data[]='ss';
//        $data['sj']='sjlovedt';
//        return json($data);
$data=request()->user;
var_dump($data->name);
// $userqv->setUsername('sss');
// var_dump($userqv);
//所有的请求都是讲id,name 以对象的形式进行数据模型的绑定
//参数的绑定 对象依赖注入都可以
    }
}