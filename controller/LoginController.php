<?php

include "../model/LoginModel.php";
class LoginController
{
    public function Login($username,$password){
        $loginModel = new LoginModel();
        $res = $loginModel->Login($username,$password);
        $r = mysqli_fetch_assoc($res);
        return $r;
    }
}