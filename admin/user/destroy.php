<?php
include('/admin/authentication.php');

$id = $_GET['id'];

// connect to the database
$servername_db = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "pnldev";

try {
    $conn = new PDO("mysql:host=$servername_db;dbname=$dbname", $username_db, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM users WHERE id='$id'";
    $conn->exec($sql);
    
    header("Location: /admin/user/list.php?status=کاربر با موفقیت حذف شد.");
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}