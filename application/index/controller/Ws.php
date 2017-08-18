<?php
namespace app\index\controller;
use think\Controller;
use think\Cache;
class Ws extends Controller{
    protected $beforeActionList=[
      'first'  
    ];
    public function first(){
        //这里实现access_token获取
        if(empty(Cache::get('access2')))
        {
           
        }
        
    }
    public function index(){
        echo Cache::get('access2');
    }
    public function createmeu(){
        
    }
    public function updatemeu(){
        
    }
    public function deletemeu(){
        
    }
    public function getmeu(){
        
    }
    
}