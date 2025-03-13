<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: /login.php");
    die();

} else if($_SESSION['user']['role'] != 0) {
    die('not authorized, login again');

}
?>