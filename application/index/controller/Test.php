<?php
namespace app\index\controller;

use think\Cache;
class Test extends Base{
    public function index(){
        echo Cache::get("access");
    }
}