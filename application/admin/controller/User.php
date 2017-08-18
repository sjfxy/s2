<?php
namespace app\admin\controller;

use think\Controller;
use think\Url;
class User extends Controller{
    public function test(){
      
      //echo Url::build('index/blog/read','id=5&name=thinkphp');
     //这里跳转路径
    
     $this->success("sss",url("admin/user/sj"));
    }
   public function sj()
   {
       echo("ss");
       
   }
    
}