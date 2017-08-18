<?php
namespace app\index\controller;
use think\Controller;
class Action extends Controller{
    protected $beforeActionList=[
        'first'
    ];
    public function first(){
        //这里做前置操作 
        echo("这是前置操作");
        
    }
    public function index(){
        echo "index";
    }
    public function createmeun(){
        echo("createmenu");
        
    }
}