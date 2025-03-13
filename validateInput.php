<?php
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
    die('');
}