<?php
namespace app\index\controller;
class Blog
{
  public function index()
  {
      echo "index";
      
  }
  public function create()
  {
      echo "create";
  }
  public function save()
  {
      echo "save";
  }
  public function read($name,$id='22',$tel=22)
  {
      echo "read"."name=".$name.""."id=".$id.""."tel=".$tel;
  }
  public function edit()
  {
      echo "edit";
      
  }
  public function update()
  {
      echo "update";
  }
  public function delete()
  {
      echo("delete");
      
  }
}