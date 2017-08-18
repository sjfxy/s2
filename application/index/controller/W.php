<?php
namespace app\index\controller;
class W extends BaseTest {
    public function test(){
       echo "第二个";
        
    }
    public function test2(){
        echo "test2";
      echo cache('ss');
    }
    
}