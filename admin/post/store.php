<?php
include('../authentication.php');

// input validation
$alerts = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']['id'];
    
    $title = $_POST['title'];
    if (!strlen($title)) {
        $alerts[] = 'لطفا نام معتبر وارد کنید.';
    }

    $slug = $_POST['slug'];
    if (!strlen($slug)) {
        $alerts[] = "لطفا فلگ معتبر وارد کنید.";
    }

    $body = $_POST['descr'];
}

if (count($alerts)) {
    header("Location: /admin/post/create.php?alerts=" . json_encode($alerts, JSON_UNESCAPED_UNICODE));
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

    $sql = "INSERT INTO posts (title, slug, body, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $slug, $body, $user_id]);
    
    header("Location: /admin/post/create.php?status=وبلاگ با موفقیت اضافه شد.");
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>