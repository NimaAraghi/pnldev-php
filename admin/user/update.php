<?php
include('../authentication.php');

// input validation
$alerts = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST["id"];
    
    $role = (int) $_POST["role"];
    if($role < 0 || $role > 2) {
        $alerts[] = 'لطفا نقش معتبر وارد کنید.';
    }

    $email_regex = '/^(([^<>()[\]\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $email = $_POST['email'];
    if (!preg_match($email_regex, $email)) {
        $alerts[] = 'لطفا ایمیل معتبر وارد کنید.';
    }

    $password_regex = '/^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/';
    $password = $_POST['password'];
    if (!preg_match($password_regex, $password)) {
        $alerts[] = 'لطفا کلمه عبور معتبر وارد کنید.';
    }

    $first_name = $_POST['first_name'];
    if (!strlen($first_name)) {
        $alerts[] = 'لطفا نام معتبر وارد کنید.';
    }

    $last_name = $_POST['last_name'];
    if (!strlen($last_name)) {
        $alerts[] = 'لطفا نام خانوادگی معتبر وارد کنید.';
    }

    $phone = $_POST['phone'];
    if (strlen($phone) != 11 || !str_starts_with($phone, '09')) {
        $alerts[] = 'لطفا شماره موبایل معتبر وارد کنید.';
    }
}

if (count($alerts)) {
    header("Location: /admin/user/create.php?alerts=" . json_encode($alerts, JSON_UNESCAPED_UNICODE));
    die(1);
}

// connect to the database
$servername_db = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "pnldev";

try {
    $conn = new PDO("mysql:host=$servername_db;dbname=$dbname", $username_db, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE users SET email=?, password=?, role=?, first_name=?, last_name=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute( [$email, $password, $role, $first_name, $last_name, $phone, $id]);
    
    header("Location: /admin/user/edit.php?id=$id&status=کاربر با موفقیت ادیت شد.");
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
