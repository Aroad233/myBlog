<?php


class DemoController
{
    protected $site_name = "Aroad Blog";

    public function index(){
        echo $this->site_name;
        echo "this is Demo-index controller";

        require_once ("view/demo_index.html");
    }

    public function api(){
        $url = "http://apis.juhe.cn/cook/index";
        $url .="?key=75cb23b4f04965e8d6c80ce4ef7d6acc&cid=1";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        $output = curl_exec($ch);

        echo $output;
    }

    public function bbb(){
        echo $this->site_name;
        echo "bbb";
    }
}