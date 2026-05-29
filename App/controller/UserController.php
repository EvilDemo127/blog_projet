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
        $this->table->addUserData($data);
        header("location: /view/userlist.php");
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
