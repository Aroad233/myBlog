<?php
include "SqlModel.php";

class LoginModel
{
    public function Login($username,$password){
        $link = SqlModel::getInstance();
        $link->connect();
        $sql = "SELECT * FROM USER WHERE username = '$username' and password = '$password'";
        $res = mysqli_query($link::$dbConnect,$sql);
        return $res;
    }
}