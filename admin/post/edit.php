<?php include('../authentication.php') ?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <?php include('../layouts/head.php') ?>
    <title>داشبورد</title>
    <style>
        .status {
            color: green;
        }
        .messages-container ul {
            color: red;
            list-style-type: none;
        }
    </style>
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include('../layouts/first-bar.php') ?>

        <?php include('../layouts/top-nav.php') ?>

        <div class="right_col" role="main">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>طرح فرم
                                <small>عناصر فرم های مختلف</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">تنظیمات 1</a>
                                        </li>
                                        <li><a href="#">تنظیمات 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="display: block;">
                            <br>
                            <form method="post" action="/admin/user/update.php" onsubmit="return validateForm()" class="form-horizontal form-label-left">

                                <?php
                                    $id = $_GET['id'];

                                    $db_servername = "localhost";
                                    $db_username = "root";
                                    $db_password = "";
                                    $db_name = "pnldev";
                                    
                                    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $sql = "SELECT * FROM users WHERE id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute([$id]);
                                    $user = $stmt->fetch();
                                ?>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control col-md-7 col-xs-12">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">ایمیل
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">کلمه عبور<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="password" name="password" value="<?php echo $user['password'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="first_name" class="control-label col-md-3 col-sm-3 col-xs-12">نام</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="first_name" class="form-control col-md-7 col-xs-12" type="text" name="first_name"  value="<?php echo $user['first_name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="control-label col-md-3 col-sm-3 col-xs-12">نام خانوادگی</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="last_name" class="form-control col-md-7 col-xs-12" type="text" name="last_name" value="<?php echo $user['last_name'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">تلفن همراه</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="phone" class="form-control col-md-7 col-xs-12" type="tel" name="phone" value="<?php echo $user['phone'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">نقش</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="role">
                                            <option value="1" <?php if ($user["role"] == 1) { echo "selected"; } ?>>کاربر</option>
                                            <option value="0" <?php if ($user["role"] == 0) { echo "selected"; } ?>>ادمین</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">ارسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="messages-container">
                            <div class="status">
                                <?php 
                                    if(isset($_GET['status'])) {
                                        echo $_GET['status'];
                                    }
                                ?> 
                            </div>
                            <ul id="messages">
                                <?php
                                    if(isset($_GET['alerts'])) {
                                        $alerts = json_decode($_GET['alerts'], true);
                                        foreach($alerts as $alert) {
                                            print("<li>$alert</li>");
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../layouts/footer.php') ?>
    </div>
</div>

<?php include('../layouts/script.php') ?>

<script>

        // Validate form inputs
        function validateForm() {
            let messages = [];

            // Validate names
            function validateName(name) {
                const $name = $(name);
                const value = $name.val();
                if (!value.match(/[آ-ی]/)) {
                    messages.push(`لطفا نام و نام خانوادگی را به فارسی بنویسید.`);
                    setBorder(name, "red");
                } else if (value.length < 3) {
                    messages.push(`لطفا نام و نام خانوادگی معتبر وارد کنید.`);
                    setBorder(name, "red");
                } else {
                    setBorder(name, "green");
                }
            }

            // Set border color
            function setBorder(elem, color) {
                const $elem = $(elem);
                if (color === "red") {
                    $elem.removeClass("green-border").addClass("red-border");
                } else {
                    $elem.removeClass("red-border").addClass("green-border");
                }
            }

            // Validate email
            const email = $("#email").val();
            if (!email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
                setBorder($("#email"), "red");
                messages.push("لطفا ایمیل معتبر وارد کنید.");
            } else {
                setBorder($("#email"), "green");
            }

            // Validate password
            const password = $("#password").val();
            if (!password.match(/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-]).{6,20}$/)) {
                setBorder($("#password"), "red");
                messages.push("کلمه عبور باید شامل حداقل 6 تا 20 حرف باشد و شامل حروف بزرگ و کوچک، اعداد و یک کاراکتر خاص باشد.");
            } else {
                setBorder($("#password"), "green");
            }

            // Validate phone
            const phone = String($("#phone").val());
            if (phone.length !== 11 || !phone.startsWith("09")) {
                setBorder($("#phone"), "red");
                messages.push("لطفا موبایل معتبر وارد کنید.");
            } else {
                setBorder($("#phone"), "green");
            }

            // Validate names
            validateName("#first_name");
            validateName("#last_name");

            // Display messages
            console.log(messages);
            
            const $messages = $("#messages");
            $messages.html("");
            messages.forEach((message) => {
                $messages.append(`<li>${message}</li>`);
            });

            // Handle message visibility
            if (messages.length) {
                $messages.show();
                return false;
            } else {
                $messages.hide();
                return true;
            }
        }
    </script>
</body>
</html>