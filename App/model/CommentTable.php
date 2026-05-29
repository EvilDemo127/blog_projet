<?php

use Database\MySql;

class CommentTable{
    private $db;

    public function __construct(MySql $sql)
    {
        $this->db =$sql->connect();
    }

    public function addComment($data){
        try {
            $stmt = $this->db->prepare("INSERT INTO comments ");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}