<?php

//header("content-type:text/html;charset=utf8");
include "../model/IndexModel.php";

class IndexController
{
    public function index(){
        $indexModel = new IndexModel();
        $res = $indexModel->getAllArticle();
        return $res;
    }

    public function mine($username) {
        $indexModel = new IndexModel();
        $res = $indexModel->getArticleById($username);
        return $res;
    }

    public function search($searchWord) {
        $indexModel = new IndexModel();
        $res = $indexModel->search($searchWord);
        return $res;
    }
}