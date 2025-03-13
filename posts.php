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

    </style>
</head>
<body>
    <?php include "layouts/header.php" ?>

    <?php
        $slug = $_GET['slug'];

        $servername_db = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "pnldev";

        $conn = new PDO("mysql:host=$servername_db;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM posts WHERE slug=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$slug]);
        $post = $stmt->fetch();
    ?>
    
    <div>
        <?php if($post): ?>
            <h1>
                <?php echo $post['title'] ?>
            </h1>

            <section>
                <?php echo $post['body'] ?>
            </section>
        <?php else: ?>
            <h1>
                وبلاگی پیدا نشد.
            </h1>
        <?php endif; ?>
    </div>

    <?php include "layouts/footer.php" ?>

    <?php include "layouts/script.php" ?>
    <script>
    </script>
</body>
</html>