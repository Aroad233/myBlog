<?php
include "../model/IssuancenModel.php";

class IssuancenController
{
    public function issuancen($title,$content,$img1,$img2,$img3,$userid){
        $issuancenModel = new IssuancenModel();
        $res = $issuancenModel->issuancen($title,$content,$img1,$img2,$img3,$userid);
        if ($res) return 1;
        else return 0;
    }
}