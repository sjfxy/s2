<?php
namespace app\index\controller;
use think\Controller;
use think\Cache;
class BaseTest extends Controller{
    /**
     * {@inheritDoc}
     * @see \think\Controller::_initialize()
     */
    //初始化动作
    protected function _initialize()
    {
       echo "ss";
        
    }
    /**
     * {@inheritDoc}
     * @see \think\Controller::__construct()
     */
    //构造函数
    public function __construct(\think\Request $request = null)
    {
       //如果为空
         if(empty(Cache::get('ss2'))){
          Cache::set("ss2",30,5);
          echo "为空ss";
         }
        
    }

    

    
    
}