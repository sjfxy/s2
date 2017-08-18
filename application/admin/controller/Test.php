<?php
namespace app\admin\controller;
use app\common\builder\ZBuilder;
class Test extends Admin
{
    public function index(){
      
       return  ZBuilder::make('form')->setPageTitle('添加')->fetch();
    }
}