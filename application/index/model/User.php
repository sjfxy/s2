<?php
namespace app\index\model;
use think\Model;
class  User extends Model
{
    public function profile(){
        return $this->hasOne('Profile','uid');
    }
}