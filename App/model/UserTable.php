<?php

namespace Model;

use Database\MySql;
use PDOException;

class UserTable{
    private $db;

    public function __construct(MySql $sql)
    {
        $this->db = $sql->connect();
    }

     public function showPagination($limit,$offset){
        try {
            $stmt =$this->db->prepare("SELECT * FROM users ORDER BY id DESC LIMIT :limit OFFSET :offset");
            $stmt->bindParam(':offset',$offset,\PDO::PARAM_INT);
            $stmt->bindParam(':limit',$limit,\PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function register($userData){
        try{
           $stmt = $this->db->prepare("INSERT INTO users (name,email,password) VALUES(:name,:email,:password)");
           $stmt->execute(
            [
                ':name'=>$userData['name'],
                ':email'=>$userData['email'],
                ':password'=>password_hash($userData['password'],PASSWORD_DEFAULT),
            ]
           );
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function addUserData($userData){
        try{
           $stmt = $this->db->prepare("INSERT INTO users (name,email,role,password) VALUES(:name,:email,:role,:password)");
           $stmt->execute(
            [
                ':name'=>$userData['name'],
                ':email'=>$userData['email'],
                ':role'=>$userData['role'],
                ':password'=>password_hash($userData['password'],PASSWORD_DEFAULT),
            ]
           );
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function showUser(){
        try {
            $stmt =$this->db->prepare("SELECT * FROM users ORDER BY id DESC");
            $stmt ->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo $e->getMessage();
        } 
    }

    public function updateUser($userData){
        try {
            $stmt =$this->db->prepare("UPDATE users SET name=:name, email=:email,role=:role WHERE id=:id");
            $stmt->execute(
                [   
                    ':id'=>$userData['id'],
                    ':name'=>$userData['name'],
                    ':email'=>$userData['email'],
                    ':role'=>$userData['role']
                ]
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchUser($id){
        try {
            $stmt =$this->db->prepare("SELECT * FROM users WHERE id=:id");
             $stmt->execute([':id'=>$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchLogin($email){
        try {
            $stmt =$this->db->prepare("SELECT * FROM users WHERE email=:email");
             $stmt->execute([':email'=>$email]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteUser($id){
        try {
            $stmt =$this->db->prepare("DELETE FROM users WHERE id=:id");
            $stmt->execute(['id'=>$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function search($search){
        try {
            $stmt =$this->db->prepare("SELECT * FROM users WHERE email LIKE :search ORDER BY id DESC");
            $stmt->execute([':search'=>'%'.$search.'%']);
            return $stmt->fetchAll();
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}