<?php
include "SqlModel.php";
class IndexModel
{

    public function getAllArticle() {
        $link = SqlModel::getInstance();
        $link->connect();
        $sql ="select aritcle.*,user.username from aritcle,user WHERE aritcle.userid = user.userid";
        $res =mysqli_query($link::$dbConnect,$sql);
        return $res;
    }

    public function getArticleById($username) {
        $link = SqlModel::getInstance();
        $link->connect();
        $sql ="select aritcle.*,user.username from aritcle,user WHERE aritcle.userid = user.userid and user.username = '$username'";
        $res =mysqli_query($link::$dbConnect,$sql);
        return $res;
    }

    public function search($searchWord) {
        $link = SqlModel::getInstance();
        $link->connect();
        $sql ="select aritcle.*,user.username from aritcle,user WHERE aritcle.userid = user.userid and aritcle.content like '$searchWord'";
        $res =mysqli_query($link::$dbConnect,$sql);
        return $res;
    }
}