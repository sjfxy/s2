<?php
namespace app\index\controller;
use think\View;
use think\Controller;



class Index extends  Controller
{
    //前端控制器 首页
    public function index()
    {
      $view=new View();
     
     return $view->fetch('/index');
     
    }
}
