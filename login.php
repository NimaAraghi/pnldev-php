<?php session_start() ?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "layouts/link.php"; ?>
    <link rel="stylesheet" href="styles/index.css">
    <title>signup</title>
    <style>
        .login-register-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }

        .login-register-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--l-green-light);
            box-shadow: 0 0 5px -1px var(--l-green);
            border-radius: 7px;
            min-width: 300px;
            padding: 40px 15px;
            margin: 50px 0 30px 0;
            position: relative;
        }

        .login-register-title {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translate(-50%, 0);
            padding: 8px;
            border-radius: 11px;
            background-color: #fff;
            box-shadow: 0 0 5px -1px var(--l-green);
            z-index: 2;
        }

        .login-register-title h5 {
            font-weight: bold;
            font-size: 19px;
        }

        .login-register-methods {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .login-register-methods a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 47%;
            padding: 10px 0;
            border: 1px solid var(--l-green);
            background-color: transparent;
            cursor: pointer;
            transition-duration: .4s;
        }

        .login-register-methods a:hover {
            background-color: var(--l-green-light-secondry);
        }

        .login-register-methods a i {
            color: var(--l-green);
        }

        .login-register-container .br {
            height: 2px;
            width: 100%;
            background-color: var(--l-green-dark);
            margin: 10px 0;
        }

        .login-register-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            gap: 8px 0;
        }

        .login-register-container form input {
            width: 100%;
            font-size: 17px;
            padding: 7px 4px;
            text-align: center;
            outline: none;
            border-radius: 7px;
        }

        .green-border {
            border: 1px solid var(--l-green);
            background-color: transparent;
        }

        .green-border:focus {
            background-color: var(--l-green-light-secondry);
        }

        .red-border {
            border: 1px solid #b80000;
            background-color: #fff;
        }

        .login-register-footer p a {
            color: #000;
        }

        .login-register-footer ul {
            list-style: none;
            color: red;
        }

        .btn-1 {
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translate(-50%, 0);
            text-decoration: none;
            padding: 1px 20px 3px;
            margin: 0 5px;
            box-shadow: 0 0 10px 1px #a3a3a3cc;
            text-shadow: 0 0 4px #0f0f0f3b;
            border: 2px solid var(--l-green-light);
            border-radius: 10px;
            color: black;
            font-size: 19px;
            transition: 1s;
        }

        .btn-1:hover {
            background-color: #00ad1abb;
            color: #fff;
        }

        .btn-1::before {
            content: "";
            height: 2px;
            width: 40%;
            position: absolute;
            top: -2px;
            left: 15%;
            background: linear-gradient(to right, transparent, #0010037a, transparent);
            transition: 1s;
        }

        .btn-1:hover::before {
            left: 45%;
        }

        .btn-1::after {
            content: "";
            height: 2px;
            width: 30%;
            position: absolute;
            bottom: -2px;
            right: 10%;
            background: linear-gradient(to right, transparent, #0010037a, transparent);
            transition: 1s;
        }

        .btn-1:hover::after {
            right: 55%;
        }

        .messages-container {

        }

        .login-register-section ul {
            color: #bd0000;
            border: 1px solid #b80000;
            border-radius: 18px;
            box-shadow: 0 0 4px 1px #b80000;
            padding: 20px 25px;
        }
    </style>
</head>

<body>
<?php include "layouts/header.php" ?>

<div class="login-register-section">
    <div class="login-register-container">
        <div class="login-register-header">
            <div class="login-register-title">
                <h5>
                    ورود / ثبت نام
                </h5>
            </div>

            <div class="login-register-methods">
                <a>
                    <i class="fa-brands fa-github"></i>
                </a>
                <a>
                    <i class="fa-brands fa-google"></i>
                </a>
            </div>
        </div>
        <div class="br"></div>

        <form method="post" action="/auth.php" onsubmit="return validateForm()">
            <input type="hidden" name="type" value="login">
            <input class="green-border" id="email" type="email" name="email" placeholder="ایمیل">
            <input class="green-border" id="password" type="password" name="password" placeholder="کلمه عبور">
            <button class="btn-1" type="submit">تایید</button>
        </form>

        <div class="login-register-footer">
            <p>فراموشی کلمه عبور</p>
            <p>حساب ندارید؟ <a href="register.php">ثبت نام</a></p>
        </div>
    </div>
    <div class="messages-container">
        <ul id="messages" style="display: <?php echo isset($_GET['alerts']) ? 'block' : 'none' ?>">
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

<?php include "layouts/footer.php" ?>

<?php include "layouts/script.php" ?>
<script>
    // validating form inputs
    function validateForm() {
        let result = true;
        let messages = [];

        // creating a function to check if any of the inputs are empty
        function isEmpty() {
            let count = 0;

            document.querySelectorAll("input").forEach((elem) => {
                if(elem.value) count++;
                if(!elem.value) setBorder(elem, "red");
            });

            if (count + 1 < $("input").length) {
                console.log(count)
                messages.push("لطفا فیلد ها را پر کنید.");
            }
        }

        // validating first_name and last_name
        function validateName(name) {
            if (!name.value.match(/[آ-ی]/)) {
                messages.push(`لطفا ${name.placeholder.replace("(فارسی)", "")} را به فارسی بنویسید.`);
                setBorder(name, "red")
            } else if (name.value.length < 3) {
                messages.push(`لطفا ${name.placeholder.replace("(فارسی)", "")} معتبر وارد کنید.`);
                setBorder(name, "red");
            } else {
                setBorder(name, "green");
            }
        }

        // seting the input border class
        function setBorder(elem, color) {
            if(color === 'red') {
                $(elem).removeClass("green-border");
                $(elem).addClass("red-border");
            } else {
                $(elem).removeClass("red-border");
                $(elem).addClass("green-border");
            }
        }

        // checking if any of the inputs are empty
        isEmpty();

        let email = $("#email").val();
        if (!String(email).match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
            setBorder($("#email"), "red");
            messages.push('لطفا ایمیل معتبر وارد کنید.');
        } else {
            setBorder($("#email"), "green");
        }

        let password = $("#password").val();
        if (!String(password).match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,20}$/)) {
            setBorder($("#password"), "red");
            if (!String(password).match(/(?=.[a-z])(?=.[A-Z])/)) {
                messages.push('کلمه عبور باید شامل الفبا انگلیسی بزرگ و کوچک باشد.');
            } else if (!String(password).match(/(?=.*[0-9])/)) {
                messages.push('کلمه عبور باید شامل حداقل یک عدد باشد.');

            } else {
                messages.push('کلمه عبور باید شامل 6 تا 20 حرف باشد.');
            }
        } else {
            setBorder($("#password"), "green")
        }

        // displaying the alert messages
        $("#messages").html('');
        messages.forEach((message, index) => {
            document.getElementById("messages").innerHTML += `<li>${message}</li>`;
        });

        // returnig the boolean
        $("#messages").hide();
        if (messages.length) {
            $("#messages").slideDown();
            return false;
        } else {
            $("#messages").hide();
            return true;
        }
    }
</script>
</body>

</html>