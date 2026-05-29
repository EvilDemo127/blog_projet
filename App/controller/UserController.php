<?php
namespace Controller;

use Database\MySql;
use Model\UserTable;
use PDOException;

class UserController{
    private $table;
    public function __construct()
    {   
        $this->table =new UserTable(new MySql());
    }

    // public function isLogin(){
    //     if(empty($_SESSION['user_id'])){
    //         header("location: ");
    //     }
    // }
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

    public function searchUser($search){
        return $this->table->search($search);
    }

    public function login($email,$password){
        $email = trim($email);
    $password = trim($password);
        if(empty($email) || empty($password)){
            header("location: login.php");
            exit();
        }else{
            try {
                $loginUser= $this->table->searchLogin($email);
                if(password_verify($password,$loginUser->password)){
                    
                    session_start();
                    $_SESSION['user_id']=$loginUser->id;
                    $_SESSION['user_name']=$loginUser->name;
                    $_SESSION['user_role']=$loginUser->role;
                    header("location: index.php");
                    exit();
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}