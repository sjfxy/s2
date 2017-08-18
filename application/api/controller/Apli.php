<?php
namespace app\api\controller;
use think\Controller;
use alipay\Pagepay;
class Apli extends Controller
{
public function index()
{
    $query_no="";
    $s=\alipay\Query::exec($query_no);//订单号查询
    //电脑网站支付
    $params=array();
  $p=new \alipay\Pagepay();
  $p->pay($params);
  
}
}