<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
class Url  extends Controller{
    public function test(){
        //调用某个控制器的某一个方法的时候如果调用当前的控制器的某一个犯法
        //action('url/test2');
       // $this->test2();
   //$this->redirect(url('ce'));
   //$this->redirect(url('da/select'));
   //定义了路由就可以进行面对路由的测试 实际
//    if(empty(Request::instance()->session('sj'))){
//        $this->redirect(url('Admin/User/login'));
//    }
//action('admin/user/login');
   //这个跳转还是一样的控制器 方法  还是默认的为这个Index 模块的
    }
    public function test2(){
        echo("ss");
        
    }
    
}