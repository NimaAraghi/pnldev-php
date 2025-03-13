<?php include('../authentication.php') ?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <?php include('../layouts/head.php') ?>
    <title>داشبورد</title>
    <style>
        .success {
            color: green;
        }
    </style>
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include('../layouts/first-bar.php') ?>

        <?php include('../layouts/top-nav.php') ?>

        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row tile_count">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                فهرست کاربران
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                        <div class="status">
                            <?php 
                                if(isset($_GET['status'])) {
                                    echo $_GET['status'];
                                }
                            ?> 
                        </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>نویسنده</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $db_servername = "localhost";
                                $db_username = "root";
                                $db_password = "";
                                $db_name = "pnldev";

                                $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $sql = "SELECT * FROM posts ORDER BY id desc";
                                $stmt = $conn->query($sql);
                                $x = 1;
                                while ($row = $stmt->fetch()): ?>
                                    <tr>
                                        <th scope="row">
                                            <?php
                                                print $x;
                                                $x = $x + 1;
                                            ?>
                                        </th>
                                        <td><?php print $row['title'] ?></td>
                                        <td><?php print $row['writer'] ?></td>
                                        <td>
                                            <a href="/admin/post/edit.php?id=<?php print($row['id']) ?>" class="btn btn-info btn-xs">ویرایش</a>
                                            <a href="/admin/post/destroy.php?id=<?php print($row['id']) ?>" class="btn btn-danger btn-xs">حذف</a>
                                        </td>
                                    </tr>

                                <?php endwhile; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../layouts/footer.php') ?>
    </div>
</div>

<?php include('../layouts/script.php') ?>
</body>
</html>