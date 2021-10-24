<?php
    require "includes/config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title']?></title>
    <link rel="stylesheet" href="media/css/style.css">
</head>
<body>
    <div id="wrapper">
        <header id="header">
            <div class="header_top">
                <div class="container">
                    <div class="header_top_logo">
                        <h1><?php echo $config['title']?></h1>
                    </div>
                    <nav class="header_top_menu">
                        <ul>
                            <li><a href="/">Главная</a></li>
                            <li><a href="pages/about_me.php">Обо мне</a></li>
                            <li><a href="https://vk.com/">Я вконтакте</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    </div>
</body>
</html>