<?php
namespace app\index\controller;
use think\Controller;
class Test2 extends Controller{
    public function test(){
      $url="http://www.myriadintl.com/tp5";
      echo urlencode($url);
    }
}