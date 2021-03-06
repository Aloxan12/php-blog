<?php
require "../includes/config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title'] ?></title>
    <link rel="stylesheet" href="../media/css/style.css">
</head>
<body>
<div id="wrapper">
    <?php include "../includes/header.php"; ?>
    <div id="content">
        <div class="container">
            <div class="row">
                <section class="content_left col-md-8">
                    <div class="block">
                        <h3>Обо мне</h3>
                        <div class="block_content">
                            <div class="full-text">
                                <h1>Обо мне</h1>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include "../includes/footer.php"; ?>
</div>
</body>
</html>