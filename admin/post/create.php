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
                            <form method="post" action="/admin/post/store.php" onsubmit="return validateForm()" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label for="title" class="control-label col-md-3 col-sm-3 col-xs-12">عنوان</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="title" class="form-control col-md-7 col-xs-12" type="text" name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="control-label col-md-3 col-sm-3 col-xs-12">Flag</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="slug" class="form-control col-md-7 col-xs-12" type="text" name="slug">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">تصویر</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="file" class="form-control col-md-7 col-xs-12" type="file" name="file">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div id="alerts"></div>
                                    <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" id="textarea-font" title="فونت"><i class="fa fa-font"></i><b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="اندازه فونت"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a data-edit="fontSize 5">
                                                        <p style="font-size:17px">بزرگ</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 3">
                                                        <p style="font-size:14px">معمولی</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 1">
                                                        <p style="font-size:11px">کوچک</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="bold" title="درشت (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                            <a class="btn" data-edit="italic" title="ایتالیک (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                            <a class="btn" data-edit="strikethrough" title="خط خورده"><i class="fa fa-strikethrough"></i></a>
                                            <a class="btn" data-edit="underline" title="زیرخط (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="insertunorderedlist" title="لیست دایره ای"><i class="fa fa-list-ul"></i></a>
                                            <a class="btn" data-edit="insertorderedlist" title="لیست عددی"><i class="fa fa-list-ol"></i></a>
                                            <a class="btn" data-edit="outdent" title="کاهش دندانه (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                            <a class="btn" data-edit="indent" title="دنداره (Tab)"><i class="fa fa-indent"></i></a>
                                        </div>

                                        <div class="btn-group">

                                            <a class="btn" data-edit="justifyright" title="تراز راست (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                            <a class="btn" data-edit="justifycenter" title="وسط (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                            <a class="btn" data-edit="justifyleft" title="تراز چپ (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                            <a class="btn" data-edit="justifyfull" title="جاستیفای (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="ابرلینک"><i class="fa fa-link"></i></a>
                                            <div class="dropdown-menu input-append">
                                                <input class="span2" placeholder="URL" type="text" data-edit="createLink">
                                                <button class="btn" type="button">افزودن</button>
                                            </div>
                                            <a class="btn" data-edit="unlink" title="حذف ابر لینک"><i class="fa fa-cut"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" title="افزودن تصویر (یا فقط بکشید و رها کنید)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage">
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="undo" title="باطل کردن (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                            <a class="btn" data-edit="redo" title="بازگردانی (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                        </div>
                                    </div>
                                    <div id="editor" class="editor-wrapper placeholderText" contenteditable="true"></div>
                                    <textarea name="descr" id="descr" style="display:none;"></textarea>
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

function validateForm() {
        // Set the value of hidden description field
        $("#descr").val($("#editor").html()); // Getting HTML from the editor

        let messages = [];

        // Validate name (title)
        function validateName(name) {
            const $name = $(name);
            const value = $name.val();
            if (!value.match(/[آ-ی]/)) {
                messages.push(`لطفا عنوان را به فارسی بنویسید.`);
            } else if (value.length < 3) {
                messages.push(`لطفا عنوان معتبر وارد کنید.`);
            }
        }

        // Validate slug (flag)
        const slug = $("#slug").val();
        if (!slug.match(/^[a-z0-9]+(?:-[a-z0-9]+)*$/)) {
            messages.push("لطفا فلگ معتبر وارد کنید.");
        }

        // Validate title
        validateName("#title");

        // Display messages
        const $messages = $("#messages");
        $messages.html(""); // Clear previous messages
        messages.forEach((message) => {
            $messages.append(`<li>${message}</li>`);
        });

        // Handle message visibility and form submission
        if (messages.length) {
            $messages.show(); // Show error messages
            return false; // Prevent form submission
        } else {
            $messages.hide(); // Hide error messages
            return true; // Allow form submission
        }
    }
    </script>
</body>
</html>