<?php

use Controller\UserController;
session_start();

require("../vendor/autoload.php");
if($_POST){
    $login =new UserController;
    $login->login($_POST['email'],$_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="/Blog/public/assets/css/bootstrap.min.css" rel="stylesheet" >
  <script src="/Blog/public/assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/e705754a75.js" crossorigin="anonymous"></script>
  <link href="/Blog/public/assets/css/style.css" rel="stylesheet" >
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm w-50 h-100 mx-auto my-auto mt-5 p-5">
                    <div class="text-center bg-dark text-white p-2"><h5>Login</h5></div>
                    <form action="" method="post">
                        <div class="form-group my-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="w-100 my-3 py-2 btn btn-dark">Login</button>
                        <a href="register.php" class="btn btn-warning w-100">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>