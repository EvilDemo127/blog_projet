<?php
session_start();
$page_title = 'blogdetails';
require("../vendor/autoload.php");


use Controller\BlogController;
use Controller\CommentController;
use Controller\UserController;

if (empty($_SESSION['user_id']) && empty($_SESSION['loggin_in'])) {
    header('location: login.php');
}
$user = new UserController;
$blog = new BlogController;
$comment = new CommentController;

if ($_GET) {
    $bloggDetail = $blog->showBlogDetails($_GET['id']);
    $showComment = $comment->showComment($_GET['id']);
    
}

if ($_POST) {
    $data = [
        'comment' => $_POST['comment'],
        'author_id' => $_SESSION['user_id'],
        'post_id' => $_GET['id']
    ];
    $comment->addComment($data);
}
for ($i=0; $i <count($showComment) ; $i++) { 
    foreach($showComment as $comm)
      $showName = $user->search($comm->author_id);
}



?>

<?php require("../layout/header.php") ?>

<div class="card">
    <h5 class="card-title text-center"><?= $bloggDetail->title ?></h5>
    <img src="../public/assets/images/<?= $bloggDetail->image ?>" alt="" class="card-image w-75 mx-auto">
    <div class="card-body">
        <div class="card-text"><?= $bloggDetail->content ?></div>

        <hr>

        <div class="comment">
            <h4>Comment</h4>
                <?php foreach($showComment as $com): ?>
                <div class="d-flex justify-content-between">
                    
                    <div class="commentText">
                        <?php foreach ($showName as $names): ?>
                            <p class="fw-bold m-1 p-1"><?= $names->name ?></p>
                        <?php endforeach ?>
                        <p><?= $com->comment ?? "" ?></p>
                    </div>
                    <div class="commentTime">
                        <p><?= date('d/m/y',strtotime($com->created_at)) ?? "" ?></p>
                    </div>
                   
                </div>
         <?php endforeach ?>
        </div>

        <form action="" method="post">
            <div class="input-group w-75 shadow-sm">
                <input type="text" name="comment" class="form-control m-0 p-0 bg-white" placeholder="Comment">
                <button type="submit" class="btn bg-light ">
                    <i class="fa-solid fa-arrow-right text-dark"></i>
                </button>
            </div>
        </form>
    </div>

    <form action="" method="post" class="ms-3">

    </form>

</div>
<?php require("../layout/footer.php") ?>