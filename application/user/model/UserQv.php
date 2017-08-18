<?php
namespace app\user\model;
class UserQv{
    private $username;
    private $nickname;
    private $tel;
    private $userDetail;
    private $password;
    private $email;
    /**
     * @return the $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return the $nickname
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @return the $tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @return the $userDetail
     */
    public function getUserDetail()
    {
        return $this->userDetail;
    }

    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param field_type $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param field_type $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @param field_type $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @param field_type $userDetail
     */
    public function setUserDetail($userDetail)
    {
        $this->userDetail = $userDetail;
    }

    /**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

   
}