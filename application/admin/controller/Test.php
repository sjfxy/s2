<?php
namespace app\admin\controller;

use think\Controller;
use wyiyun\Common;
/**
 * 
 * @author 时
 * @package app\admin\controller
 * @description:测试控制器
 *
 */
class Test extends Controller
{
    public function index(){
      
      //session('user_id',rand(1,1000));
        // 删除（当前作用域）
        //session('user_id', null);
        echo 'ss';
    }
    public function ss(){
        $wyiyun=new Common(config('appkey'), config('appsecret'));
        
        $data=$wyiyun->syctoaccount('werqwt');
      
    }
}