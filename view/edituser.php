<?php
$page_title='edituser';
use Controller\UserController;
require ("../vendor/autoload.php");
$datas =new UserController;
if(!empty($_GET['id'])){
    $data =$datas->search($_GET['id']);
}
    if($_POST){
        $updateDate=[
            'id'=>$_POST['id'],
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'role'=>$_POST['role'] ?? 1 
        ];
    $datas->update($updateDate);
    header("location: userlist.php");
    }
?>

<?php require("../layout/header.php") ?>
<div class="d-flex justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <h5 class="card-title text-center bg-dark text-white py-3">
                <i class="fa-solid fa-user me-2"></i>
                Edit User Info
            </h5>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $data->id?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $data->name?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $data->email ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Admin</label>
                        <input type="checkbox" class="" name="role" id="role" value="0" <?= $data->role ==0 ?"checked" :"" ?>>
                    </div>
                    <button class="btn btn-dark w-100"><i class="fa-solid fa-floppy-disk me-2"></i>Save</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require("../layout/footer.php") ?>