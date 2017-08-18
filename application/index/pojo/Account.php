<?php
namespace app\index\pojo;
class Account 
{
    private $username;
    private $password;
    private $logintime;
    private $loginip;
    public function __construct($user){
        $this->username=$user['username'];
        $this->password=$user['password'];
        $this->loginip=$user['loginip'];
        $this->logintime=$user['logintime'];
    }
    public function __toString(){
        return "username=".$this->username;
    }
    /**
     * @return the $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return the $logintime
     */
    public function getLogintime()
    {
        return $this->logintime;
    }

    /**
     * @return the $loginip
     */
    public function getLoginip()
    {
        return $this->loginip;
    }

    /**
     * @param field_type $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param field_type $logintime
     */
    public function setLogintime($logintime)
    {
        $this->logintime = $logintime;
    }

    /**
     * @param field_type $loginip
     */
    public function setLoginip($loginip)
    {
        $this->loginip = $loginip;
    }

    
}