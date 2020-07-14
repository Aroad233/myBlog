<?php
include "SqlModel.php";

class RegisterModel
{
    public function SearchUsername($username) {
        $link = SqlModel::getInstance();
        $link->connect();
        $sql = "select userid from user where username= '$username'";
        $res = mysqli_query($link::$dbConnect,$sql);
        return $res;
    }

    public function Register($username,$password) {
        $link = SqlModel::getInstance();
        $link->connect();
        $sql = "insert into user(username,password,authrity) values ('$username','$password',5)";
        $res = mysqli_query($link::$dbConnect,$sql);
        return $res;
    }
}