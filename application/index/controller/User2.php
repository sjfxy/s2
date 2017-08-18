<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User;
use think\Loader;
use app\index\model\Profile;
use think\View;
class User2 extends Controller{
    function add(){
//         $user=User::get(1);
//         $user->name='ss';
//         $user->save();

// $user=new User();
// $user->name="thinkphp";
// $user->save();
// $user=Loader::model('User');
// $user->name="sjlovefx";
// $user->save();
// $user=model("User");
// $user->name="th";
// $user->save();
// echo $user->id;
//         $user = new User;
//         $list = [
//                 ['id'=>8,'name'=>'thinkphp2','email'=>'thinkphp@qq.com'],
//                 ['id'=>9,'name'=>'onethink2','email'=>'onethink@qq.com']
//             ];
//         $user->saveAll($list);

         echo $user=User::get(1);
        
        
        
    }
    function get($id){
//        $profile=Profile::find(1);
//        echo $profile->user->name;

// Index view Controlelr action.html 
// Index view controoler chose.html
// Index view 
//return $view->fetch('member/read');

//return $view->fetch("admin@member/edit");

//return $view->fetch("/index");
$view =new View();
$data['name']='sj';
$data['email']='11';
$view->assign('data',$data);
return $this->display('get');
    }
}