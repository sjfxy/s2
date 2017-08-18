<?php
namespace app\test\controller;
use think\Controller;
use think\Request;
use app\test\service\Yeprocess;
class User extends Controller{
    //这里对于需要
    //继承控制器即可 跳转到如果没有的话就跳转
    public function index()
    {
     //这里只是进行演示   
     //页面显示即可
   session('userinfo','sss');
    echo "成功".input('session.userinfo');
    
    }
    public function login(){
        if(IS_GET){
            $this->fetch();
        }else {
            $username=Request::instance()->post('username');
            $password=md5(Request::instance()->post('password'));
            //异步验证
        }
        
    }
    public function loginout(){
        
    }
    public function checkusername($username){
        
    }
    public function checkpassword($password){
        
    }
    public function checkmobile($mobile){
        
    }
    public function checkemail(Yeprocess $ye){
        
        //调用依赖注入
        $ye->test();
    }
}