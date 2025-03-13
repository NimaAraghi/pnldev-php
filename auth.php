<?php
session_start();

// input validation
$alerts = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];

    $email_regex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $email = $_POST['email'];
    if (!preg_match($email_regex, $email)) {
        $alerts[] = 'لطفا ایمیل معتبر وارد کنید.';
    }

    $password_regex = '/^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/';
    $password = $_POST['password'];
    if (!preg_match($password_regex, $password)) {
        $alerts[] = 'لطفا کلمه عبور معتبر وارد کنید.';
    }

    if ($type == "register") {
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
}

if (count($alerts)) {
    header("Location: register.php?alerts=" . json_encode($alerts, JSON_UNESCAPED_UNICODE));
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

    if ($type == 'register') {
        $sql = "INSERT INTO users (email, password, first_name, last_name, phone) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $password, $first_name, $last_name, $phone]);

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ];

            if ($user['role'] == '0') {
                header("Location: /admin/dashboard.php");
                die(1);
            } else {
                header("Location: dashboard.php");
                die(1);
            }
        }
    } else if ($type == 'login') {
        $sql = "SELECT * FROM users WHERE email=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ];

            if ($user['role'] == '0') {
                header("Location: /admin/dashboard.php");
                die(1);
            } else {
                header("Location: dashboard.php");
                die(1);
            }
        } else {
            $alerts[] = "رمز یا کلمه عبور اشتباه است.";
            header("Location: $type.php?alerts=" . json_encode($alerts, JSON_UNESCAPED_UNICODE));
            die(1);
        }
    }
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>