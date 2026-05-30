<?php
$page_title = 'adduser';
session_start();
if (empty($_SESSION['user_id']) && empty($_SESSION['loggin_in'])) {
    header('location: login.php');
}
require("../vendor/autoload.php");

use Controller\UserController;

if ($_POST) {
    $userData = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'role' => $_POST['role'] ?? 1,
        'password' => $_POST['password']
    ];

    $data = new UserController;
    $errCatch = $data->addUser($userData);
}

?>

<?php require("../layout/header.php") ?>

<div class="d-flex justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow p-3">
            <h5 class="card-title text-center bg-dark text-white py-3">
                <i class="fa-solid fa-user-plus me-2"></i>
                Create User
            </h5>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <p class="text-danger"><?= $errCatch['name'] ?? ""  ?></p>
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <p class="text-danger"><?= $errCatch['email'] ?? ""  ?></p>
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <p class="text-danger"><?= $errCatch['password'] ?? "" ?></p>
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Admin</label>
                        <input type="checkbox" class="" name="role" id="role" value="0">
                    </div>
                    <button class="btn btn-dark w-100"><i class="fa-solid fa-floppy-disk me-2"></i>Save</button>
                </form>
            </div>
        </div>
    </div>
</div>