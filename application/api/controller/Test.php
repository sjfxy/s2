<?php
namespace app\api\controller;
use think\Controller;
class Test extends Controller
{
    public function test()
    {
    $data=array(
        'button'=>array(
            array('type'=>'click',
                'name'=>urlencode('说'),
                'key'=>'sjlovefxy'
            ),
            array(
                'name'=>urlencode('菜单'),
                'sub_button'=>array(
                    'type'=>'view',
                    'name'=>urlencode('搜索'),
                    'url'=>'www.baidu.com'
                )
            )
        )
    );
 var_dump(urldecode(json_encode($data)));
   
    }
}