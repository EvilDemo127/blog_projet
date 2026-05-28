<?php

namespace Database;

use PDO;
use PDOException;

class MySql{
    private $db;

    public function __construct(
        private $dbhost="localhost",
        private $dbname="blog",
        private $dbuser="root",
        private $dbpassword="",

    )
    {
       
    }

    public function connect(){
      try {
        return  $this->db = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname",$this->dbuser,$this->dbpassword,
        [
          PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
        ]);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
}