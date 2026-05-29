<?php
session_start();

    echo "success";

    session_unset();
      header("Location: ../public/login.php");
    exit();
