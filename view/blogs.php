<?php
$page_title = 'blogs';
session_start();
if (empty($_SESSION['user_id']) && empty($_SESSION['loggin_in'])) {
    header('location: login.php');
}
require("../vendor/autoload.php");

use Controller\BlogController;

//start pagination
$blogData = new BlogController;
$totalBlogs = $blogData->showBlog();
$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;
$total_page = ceil(count($totalBlogs) / $limit);

//end pagination

if (isset($_GET['search'])) {
    $datas = $blogData->searchBlog($_GET['search']);
} else {
    $datas = $blogData->showPagination($limit, $offset);
}

?>
<?php require("../layout/header.php") ?>
<div class="ms-5">
    <h4 class="card-heard text-center">Blogs</h4>
    <div class="d-flex flex-wrap gap-3">
        <?php foreach ($datas as $data): ?>
            <a class="text-decoration-none" href="blogdetails.php?id=<?= $data->id ?>">
                <div class="card text-center" style="width: 300px; height: 300px;">
                    <img src="../public/assets/images/<?= $data->image ?> " alt="<?= $data->image ?>" class="card-image">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data->title ?></h5>
                        <p class="card-text"><?= substr($data->content, 0, 50) ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>
<?php require("../layout/footer.php") ?>