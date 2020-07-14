<?php
include "../model/RegisterModel.php";

class RegisterController
{
    public function Register($username,$password){
        $registerModel = new RegisterModel();
        $res = $registerModel->SearchUsername($username);
        $r = mysqli_fetch_assoc($res);
        if (empty($r)) {
            $r = $registerModel->Register($username,$password);
            if ($r) return 1;
        } else {
            return 2;
        }
        return 2;
    }
}