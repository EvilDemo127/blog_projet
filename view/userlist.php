<?php
$page_title='userlist';
require("../vendor/autoload.php");
use Controller\UserController;
$i = 1;

//start pagination
$userData = new UserController;
$totalUsers = $userData->showAllUser(); 
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;
$total_page = ceil(count($totalUsers) / $limit);
//end pagination

if(!empty($_GET['id'])){
    $userData->delete($_GET['id']);
}
if(!empty($_GET['search'])){
    $users = $userData->searchUser($_GET['search']);
}else{
    $users = $userData->showingPagination($limit, $offset); 
}

?>

<?php require("../layout/header.php") ?>


    <div class="card">
        <h1 class="h4 text-center">User List</h1>
    </div>
    <div>
     <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr> 
                    <th scope="row"><?= $i ?></th>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><span class="badge bg-primary"><?= ($user->role) ==0 ?"Admin" :"User" ?></span></td>
                    <td>
                        <a href="edituser.php?id=<?= $user->id ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="?id=<?= $user->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php $i++ ?>
                    <?php endforeach ?>
            </tbody>
        </table>


    </div>


<?php require("../layout/footer.php") ?>