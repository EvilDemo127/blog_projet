<?php
$page_title='blogdetails';
require ("../vendor/autoload.php");

use Controller\BlogController;
    if($_GET){
        $blog =new BlogController;
        $bloggDetail =$blog->showBlogDetails($_GET['id']);
    }
?>

<?php require("../layout/header.php") ?>

<div class="card">
    <h5 class="card-title text-center"><?= $bloggDetail->title ?></h5>
    <img src="../public/assets/images/<?= $bloggDetail->image ?>" alt="" class="card-image w-75 mx-auto" >
    <div class="card-body">
        <div class="card-text"><?= $bloggDetail->content ?></div>        
        <div class="comment">
            <h4>Comment</h4>
        </div>
        <hr>
        <div class="comment">
            <h4>Show Comment</h4>
        </div>
        <form action="">
            <div class="input-group w-75 shadow-sm">
                <input type="text" name="comment" class="form-control m-0 p-0 bg-white" placeholder="Comment" >
                <button type="submit" name="submit_comment" class="btn bg-light ">
                <i class="fa-solid fa-arrow-right text-dark"></i>
            </button>
         </div>
        </form>
    </div>
    
    <form action="" method="post" class="ms-3">

    </form>

</div>
<?php require("../layout/footer.php") ?>