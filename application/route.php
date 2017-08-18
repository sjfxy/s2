<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::get('/','Index/index');
Route::get('auth','Auth/index');
//如果默认的都是Index模块这里包括前端路由和各个模块路由定义
//Route::get("/user/:id","Index/test6");//或默认的上成http://www.test.com/index.php/Index/Index/test6/id/3
//这里默认的是模块为Index 模块下的IndexController index方法
// Route::get("new/:id","News/read");
// Route::post("new/:id","News/update");
// Route::put("new/:id","News/update");
// Route::delete("new/:id","News/delete");
// Route::any("new/:id",'News/read');
// //Route::rule("new/:id","News/read",'GET|POST');
// //我们也可以批量注册路由规则，例如：
// $rule=['new/:id'=>'News/read','blog/:name'=>'Blog/detail'];
// Route::rules($rule);
// Route::get($rule);
// Route::post($rule);
// Route::any(':action/News/:id','News/:action');
// Route::any(':c/:a',"Index/:c/:a");
//Route::any('news/:id','Index/test7?status=0&app_id=5');
//这个路由用来进行对请求是否本网站的进行加密进行验证只有这些的路由请求采取处理
//如果请求的数据后面根本就没有传入相应的参数 并且做一个本系统的进行验证加密的一般key appsercret time shal 进行加密
//进行比对



/**
 * 这种方式看起来似乎和第一种是一样的，本质的区别是直接执行某个控制器类的方法，而不需要去解析 模块/控制器/操作这些，同时也不会去初始化模块。
 例如，定义如下路由后：
 */
//Route::any('news/:id','@index/index/test8');

//Loader::action('index/blog/read');

//Route::get("news/:id","http://www.ehuangpu.org");
//Route::any(array('blog/:id'=>'http://data.ehuangpu.org'));



/**
 * 路由分组功能允许把相同前缀的路由定义合并分组，这样可以提高路由匹配的效率，不必每次都去遍历完整的路由规则。

例如，我们有定义如下两个路由规则的话

 */
// $routes=[':id'=>['Index/test8',['method'=>'get'],['id'=>'\d+']],
//          ':name'=>['Index/test',['method'=>'post']]
    
    
// ];
// Route::group('blog', $routes);
//Route::resource("news","Index/Blog",['only'=>['index','read']]);//定义资源路由
//Route::get('item-<name>-<id>','Blog/read',[],['name'=>'\w+','id'=>'\d+']);//最新的定义的淘宝和京东的方式

//Route::get("item<name><id>",'Blog/read',[],['name'=>'[a-zA-Z]+','id'=>'\d+']);
//Route::get("item@<name>-<id>",'Blog/read',[],['name'=>'\w+','id'=>'\d+']);
//Route::get("sfy_<name>_<id>_<tel>",'Blog/read',[],['name'=>'[a-zA-Z]+','id'=>'\d+','tel'=>'\d+']);

//这种的隐蔽的url解析我喜欢资源 定义到url controlelr Module Module COntrolelr Modeule Controller Action 

//@ 注解扫描一样配置 <name>_<catry_id>_<menu_id>_<view_id>?

//如果是传递的是可变参数 user Model 参数绑定到模型
/**
 * //Route::get("sfy_<name>_<id?>","Blog/read",[],['name'=>'\w+','id'=>'\d+']);
 */
 //Route::get("re",'Re/db',[]);
 Route::get("Re/:a","Re/:a",[]);
 //Route::get(":c/:a","Index/:c/:a",['id'=>'\d+']);
// Route::get("test",'Re/C',[]);
// return [
//     'hello/:name'=>['Re/C',[],['name'=>'\w+']]
    
// ];
Route::get("wx",'Wx/index',[]);
Route::get("te","Test/index",[]);
Route::get('s','index/test',[]);
Route::get('admin','Admin/User/test',[]);
Route::get('ce','da/select',[]);
Route::get('e','url/test',[]);
Route::get('sj/fxy','da/get',[]);
Route::get('admin/login','Admin/User/login',[]);
Route::get('fxy','Api/Meun/createmeun',[]);
Route::get('test','api/Test/test',[]);
Route::get('createmeun','api/Meun/createmeun',[]);
Route::get('get','api/meun/getmeun',[]);
Route::get('auth','api/auth/index',[]);
Route::get("tsss",'Test2/test');
Route::get("user/:openid/:access_token",'Api/User/index');
Route::get('qr','api/Qrcode/create',[]);
Route::get('batch','api/Qrcode/batchcode');
Route::get('message','api/Message/send');
Route::rule('login/:id','admin/user/login');
Route::get('admin/test','admin/user/test');
Route::rule('login/:id','index/blog/read');
Route::rule('user/:openid','user/user/login');
Route::rule('cesi','api/user/test');
Route::rule('luyou/:id','api/user/register');
Route::get('api/service','api/Customerservice/add');
Route::get('qunfa','api/Qunfa/uploadimg');
Route::get("g",'api/Qunfa/geturl');
Route::get('kaqaun','api/Coupon/create');
Route::get('qrcode','api/Coupon/qrcode');
Route::get('la','api/Coupon/landingpage');
Route::get('mp','api/Coupon/mpnews');
Route::get('com','test/Api/delete');
Route::get('k','admin/User/test');
Route::get('k2','test/User/checkemail');
Route::get("jj","admin/user/sj",[]);
Route::get('ko','admin/Test/index',[]);
//参数绑定数据模型
Route::rule('dt/:id','user/user/test','GET',
    [
      'ext'=>'html',
        'bind_model'=>[
            'user'=>'\app\user\model\User',
        ],
    ]
    );
Route::rule('hello/:name/:id','user/user/test','GET',[
       'bind_model'    =>  [
             'user'  =>  ['\app\user\model\User','id&name']
          ],
    ]);
