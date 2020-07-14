<?php

header("content-type:text/html;charset=utf-8");
class SqlModel
{
    private static $instance;
    public static $dbConnect;

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
        trigger_error("Can't clone object",E_USER_ERROR);
    }

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect() {
        self::$dbConnect = @mysqli_connect("localhost","root","123456");
        if (!self::$dbConnect){
            throw new Exception("mysql connect error".mysqli_connect_error());
        }

        mysqli_set_charset(self::$dbConnect,'utf8');
        mysqli_select_db(self::$dbConnect,"aroadblogforphp");

        return self::$dbConnect;
    }

}