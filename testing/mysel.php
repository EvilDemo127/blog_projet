<?php
require ("../vendor/autoload.php");
use Database\MySql;
use Database\Table;
$data=[
    'name'=>'name',
    'email'=>'email@gmail.com',
    'password'=>'password',
];
$pos =new Table(new MySql());
$pos->addUserData($data);

// DONE
