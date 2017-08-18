<?php
namespace app\index\controller;
use think\Request;
use think\console\Input;
use think\Db;
class Re
{
    public function index(){
        //也可以使用助手函数
        //$request = request();
        //当然，最方便的还是使用注入请求对象的方式来获取变量。
       $request2=Request::instance();
       // 获取当前域名
       echo "domain:".$request2->domain()."<br/>";
       // 获取当前入口文件
       echo "file:".$request2->baseFile()."<br/>";
       // 获取当前URL地址 不含域名
       echo 'url: ' . $request2->url() . '<br/>';
       // 获取包含域名的完整URL地址
       echo 'url with domain: ' . $request2->url(true) . '<br/>';
       // 获取当前URL地址 不含QUERY_STRING
       echo 'url without query: ' . $request2->baseUrl() . '<br/>';
       // 获取URL访问的ROOT地址
       echo 'root with domain: ' . $request2->root(true) . '<br/>';
       
       // 获取URL地址中的PATH_INFO信息
       echo 'pathinfo: ' . $request2->pathinfo() . '<br/>';
       // 获取URL地址中的PATH_INFO信息 不含后缀
       
       echo 'pathinfo: ' . $request2->path() . '<br/>';
       
       
       // 获取URL地址中的后缀信息
       echo 'ext: ' . $request2->ext() . '<br/>';
        
    }
    function C(){
//         $request=Request::instance();
//         echo "当前模块名称是" . $request->module();
//         echo "当前控制器名称是" . $request->controller();
//         echo "当前操作名称是" . $request->action();

        $request = Request::instance();
//        echo '请求方法：' . $request->method() . '<br/>';
//        echo '资源类型：' . $request->type() . '<br/>';
//        echo '访问地址：' . $request->ip() . '<br/>';
//        echo '是否AJax请求：' . var_export($request->isAjax(), true) . '<br/>';
//        echo '请求参数：';
//        dump($request->param());
//        echo '请求参数：仅包含name';
//        dump($request->only(['id']));
//        echo '请求参数：排除name';
//      

        //dump($request->except(['name']));
        
        //获取路由和调度信息
        
        echo '路由信息：';
        dump($request->route());
        echo '调度信息：';
        dump($request->dispatch());
        
        
        
        
        
    }
    
    public function test(){
        //检测变量是否设置

//可以使用has方法来检测一个变量参数是否设置，如下：
    
//         input('?get.id');
//         input('?post.name');
// $name=Request::instance()->param("name");
// $all=Request::instance()->param();
// $or=Request::instance()->param(false);
// $f=Request::instance()->param(true);
// $name=input("param.name");
// $all=input('param.');
// input('name');
// input('');
Request::instance()->get('id');
Request::instance()->get('name');
Request::instance()->get();
Request::instance()->get(false);
Request::instance()->param('id');
Request::instance()->param('name');
input('id');
input('name');
input('param.id');
input('param.name');
input('get.id');
input('get.name');
input("get.");

Request::instance()->post('name');
Request::instance()->post();
Request::instance()->post(false);

input('post.id');
input('post.name');
Input('post.');

Request::instance()->put('id');
Request::instance()->put();
Request::instance()->put(false);

input('put.id');
input('put.');

Request::instance()->request('id'); // 获取某个request变量
Request::instance()->request(); // 获取全部的request变量（经过过滤）
Request::instance()->request(false); // 获取全部的request原始变量数据

input('request.id');
input('request.');

Request::instance()->server('PHP_SELF');
Request::instance()->server();
input("server.PHP_SELF");
input("server.");

Request::instance()->session("app_id");
Request::instance()->session();
input("session.app_id");
input("session.");

Request::instance()->cookie('user_id'); // 获取某个cookie变量
Request::instance()->cookie(); // 获取全部的cookie变量

input("cookie.user_id");
input("cookie.");

//如果需要更改请求变量的值，可以通过下面的方式：
//// 更改GET变量
// 2.Request::instance()->get(['id'=>10]);
// 3.// 更改POST变量
// 4.Request::instance()->post(['name'=>'thinkphp']);


    
}
function head(){
    $info=Request::instance()->header();
    return $info;
}
function db(){
    
//     $info=Db::query("select * from account where account=:id",['id'=>'2']);
//     if($info){
//         return ['status'=>'sucess'];
//     }
//这里进行数据库对的测试
//table where where whereOr & | 
    $where=array("id"=>1,'account'=>2);
    $info=Db::table("account")
    ->where($where)
    ->find();
    //return $info;
    //table field where find select group order limit off having 
    //查询数据库table field where whereor whereOr where($where) find select
   $result=Db::table("account")->where(function ($query){
       $query->where('id',1)->whereor('id',2);
   })->whereOr(function ($query){
       $query->where('account',2)->whereor("account",3);
   })->select();
   //select * from account where('id'=1 or 'id'=2) OR ('account'=2 or 'account'=3) 
   //return $result;
   
   //获取数据表信息
   //return Db::getTableInfo("account");
   //return  Db::getTableInfo("account",'fields');
   
   //return Db::getTableInfo("account",'type');
   return Db::getTableInfo("account",'pk');
   //获取数据库表的字段信息 字段类型 主键 索引 外键触发器函数 数据结构
}
function select(){
  //return  Db::table('account')->where(array('id'=>1))->select();
  //return db('account')->where("id",1)->select();
  //使用Query对象或闭包查询

//或者使用查询对象进行查询，例如：
// $query=new \think\db\Query();
// $query->table("account")->where('id',1);
// return Db::find($query);
// Db::select($query);
// return Db::select(function ($query){
//    $query->table('account')->where('id',1); 
// });
  
}
function cloumn()
{
    //这个首选根据用户名查询出密码 如果用户存在 就取出密码字段的值这个是个人的
   //return  Db::table("account")->where('id',1)->value('account');
   $a=input('post.account');
   $Upassword=input('post.password');
   $account=Db::table('account')->where('account',$a)->find();
   if(isset($account))
   {
       $password=Db::table('account')->where('account',$a)->value('password');
       if($password!=md5($Upassword))
       {
           return ['status'=>'error'];
       }
   }
}
function clu(){
    return Db::table('account')->where('account',2)->column('id','account');
}
function chuck(){
    /**
     * 数据集分批处理

如果你需要处理成千上百条数据库记录，可以考虑使用chunk方法，该方法一次获取结果集的一小块，然后填充每一小块数据到要处理的闭包，该方法在编写处理大量数据库记录的时候非常有用。

     */
//     Db::table('account')->chunk(3,function ($account){
//         foreach ($account as $a){
//             var_dump($a);
            
//         }
//     });
//return Db::table("account")->where('account$.status','1')->find();
//     $subQuery=Db::table('account')->field('id,account')->where(function ($query){
//         $query->where('id',1)->whereor('id',2);
//     })->whereOr(function ($query){
//         $query->where('staus',2)->whereor('status',3);
//     })->fetchSql()->select();
//    return $subQuery;
// $subQuery=Db::table('account')->field('id,account')
// ->where('id',['in','2,3,4'],['=','6'],'or')
// ->whereOr('status',['<','3'],['<>','1'],'and')
// ->fetchSql()
// ->select();
// return $subQuery;
//复杂的可以写成这种 table field where whereOr where 字段表达式 值 表达式 or and
 //多个组合写成数组的形式 如上面的写法 先在  数据库测试好之后可以写成这种 多表
//     $ComQuery=Db::table('account,person,art')
//     ->field('account.id,person.username,person.sex,art.id')
//     ->where('account.id=person.acid')
//     ->where('art.pid=person.id')
//     ->where('account.id',['in','1,2,3'])
//     ->fetchSql()
//     ->select();
//     return $ComQuery;
// $result=Db::table('account')->alias('a')
// ->join('person p','p.acid=a.id')
// ->select();
// return $result;
$res=Db::table('account')->alias(['account'=>'a','person'=>'p'])
->join('person','p.acid=a.id')
->select();
return $res;
}
function bind(){
    //这里比较好的就是一个数据库的切分array_chunk 还有就是可以进行数据库查询的数据进行缓存
    //cache 缓存 时间 缓存的key file db memcached redis pgsql apc apcu 
   $where=array("id"=>1);
   $r= Db::table('account')->where($where)->cache('sj2',60)->find();
   
   //return $r;
   $data=\think\Cache::get('sj2');
   return $data;
}
public function part(){
    //这里我们开发第一个 使用chunk对返回的结果集进行分割切开进行处理
    //对查询的结果集进行缓存 
    //数据库进行将用户的请求进行分开
    //将请求进行分组 进行利用mysql缓存队列的形式 进行数据库访问的请求分流
    //对数据库进行分表水平进行分开
    //数据库查询的结果进行存错过程 数据的处理函数
    //进行读写分开进行请求
    //进行本地化的业务逻辑调整 
    //将数据先缓存到本地 然后设置调度队列中
    //进行整体的数据的插入 更新 
    //ngix负载均衡必须使用
    //对用户的一些对时效性要求不高的进行页面静态化
    //页面缓存惰性的发出请求
    
}
}