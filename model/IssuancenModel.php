<?php
include "SqlModel.php";

class IssuancenModel
{
    public function issuancen($title,$content,$img1,$img2,$img3,$userid){
        $link = SqlModel::getInstance();
        $link->connect();
        $sql = "insert into aritcle(title, content, img1, img2, img3, time, userid) values ('$title','$content','$img1','$img2','$img3',now(),'$userid')";
        $res = mysqli_query($link::$dbConnect,$sql);
        return $res;
    }
}