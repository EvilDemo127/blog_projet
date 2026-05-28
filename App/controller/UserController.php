<?php
namespace Controller;
use Database\MySql;
use Database\UserTable;

require("../vendor/autoload.php");

class UserController{
    private $table;
    public function __construct()
    {   
        $this->table =new UserTable(new MySql());
    }
    public function addUser($data){
        return $this->table->addUserData($data);
    }

    public function showAllUser(){
        return $this->table->showUser();
    }

    public function edit($data){
       return $this->table->updateUser($data);
    }

    public function delete($id){
        return $this->table->deleteUser($id);
    }

    public function search($id){
        return $this->table->searchUser($id);
    }

    public function update($data){
        return $this->table->updateUser($data);
    }

    public function showingPagination($limit,$offset){
        
        return $this->table->showPagination($limit,$offset);
    }
}