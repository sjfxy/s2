<?php
namespace app\index\controller;
class News 
{
public function read()
{
    return ['data'=>array("username"=>"sj"),"code"=>"200","mesg"=>"测试"];
}
public function update($id)
{
    echo "id=".$id;
    
}
public function delete($id)
{
    echo $id;
}
}