<?php
namespace app\test\controller;
use think\Controller;
class Common extends Controller{
    /**
     * {@inheritDoc}
     * @see \think\Controller::_initialize()
     */
    protected function _initialize()
    {
        $userinfo=input('session.userinfo');
       if(!isset($userinfo))
       {
           $this->redirect('test/User/index');
           //这里定义一些请求网站请求的过滤 请求地址 
           //身份
       }
        
    }

    
}