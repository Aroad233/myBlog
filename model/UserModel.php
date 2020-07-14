<?php


class UserModel
{
    public $table = "user";
    public function getAllUsers(){
        $sql = "select * from".$this->table;

        return $sql;
    }

    public function searchUser($username){
        $sql = "select from".$this->table."where username =".$username;

        return $sql;
    }
}