<?php

namespace Controller;

use Database\MySql;
use Helper\csrf;
use Model\UserTable;


class UserController
{
    private $table;
    public function __construct()
    {
        $this->table = new UserTable(new MySql());
    }

    public function registerUser($data)
    {
        $this->table->register($data);
    }

    public function addUser($data)
    {

        $user =$this->table->search($data['email']);
        if (empty($data['name']) || empty($data['email']) || empty($data['password']) || strlen($data['password']) < 6 || !empty($user)) {
            $err = [];
            if (empty($data['name'])) {
                $err['name'] = "* Name can;t be empty";
                return $err;
            }
            if (empty($data['email'])) {
                $err['email'] = "* Email can;t be empty";
                return $err;
            }
            if (empty($data['password'])) {
                $err['password'] = "* Password can;t be empty";
                return $err;
            }
            if (strlen($data['password']) < 6) {
                $err['password'] = "* Password at last 6";
                return $err;
            }if(!empty($user)){
                echo "<script>alert('Name and Email already used');</script>";
            }
        } else {
            $this->table->addUserData($data);
            header("location: ../view/userlist.php");
        }
    }

    public function showAllUser()
    {
        return $this->table->showUser();
    }

    public function edit($data)
    {
        return $this->table->updateUser($data);
    }

    public function delete($id)
    {
        return $this->table->deleteUser($id);
    }

    public function search($id)
    {
        return $this->table->searchUser($id);
    }

    public function update($data)
    {
        return $this->table->updateUser($data);
    }

    public function showingPagination($limit, $offset)
    {

        return $this->table->showPagination($limit, $offset);
    }

    public function searchUser($search)
    {
        return $this->table->search($search);
    }

    public function login($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            $loginData = $this->table->search($email);
            if ($loginData && password_verify($password, $loginData[0]->password)) {
                session_start();
                $_SESSION['user_id'] = $loginData[0]->id;
                $_SESSION['user_name'] = $loginData[0]->name;
                $_SESSION['loggin_in'] = time();
                header("location: ../public/index.php");
            } else {
                header("location: ../public/login.php");
            }
        }
    }
}
