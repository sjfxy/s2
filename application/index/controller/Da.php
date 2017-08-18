<?php
namespace app\index\controller;
use think\Db;
class Da{
  public function index(){
      Db::listen(function ($sql,$time,$explain){
         echo $sql.'['.$time.'s]';
         dump($explain);
      });
  }
  public function select(){
     echo "ss";
  }
  public function get(){
      echo("登录");
      
  }
}