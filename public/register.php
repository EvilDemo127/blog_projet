<?php

use Controller\UserController;

require("../vendor/autoload.php");
if($_POST){
    $data=[
        'name'=>$_POST['name'],
        'email'=>$_POST['email'],
        'password'=>$_POST['password']
    ];
    $addData = new UserController;
    $add =$addData->registerUser($data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="/Blog/public/assets/css/bootstrap.min.css" rel="stylesheet" >
  <script src="/Blog/public/assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/e705754a75.js" crossorigin="anonymous"></script>
  <link href="/Blog/public/assets/css/style.css" rel="stylesheet" >
</head>
<body>
    <div class="d-flex justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow p-3">
            <h5 class="card-title text-center bg-dark text-white py-3">
                <i class="fa-solid fa-user-plus me-2"></i>
                Register
            </h5>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button class="btn btn-dark w-100"><i class="fa-solid fa-floppy-disk me-2"></i>Save</button>
                    <a href="login.php" class="btn btn-warning my-2 w-100">Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>