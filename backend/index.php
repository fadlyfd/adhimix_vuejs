<?php
session_start();

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {

    header('Location: home.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>
