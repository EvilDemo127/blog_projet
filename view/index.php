<?php
session_start();
if (empty($_SESSION['user_id']) && empty($_SESSION['loggin_in'])) {
    header('location: login.php');
}
$page_title = "index";

?>
<?php require("../layout/header.php") ?>

<?php require("../layout/footer.php") ?>