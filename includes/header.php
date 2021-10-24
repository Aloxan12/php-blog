<?php
    require "config.php";
?>

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

    <div class="header_bottom">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Безопасность</a></li>
                    <li><a href="#">Программирование</a></li>
                    <li><a href="#">Образ жизни</a></li>
                    <li><a href="#">Музыка</a></li>
                    <li><a href="#">Саморазвитие</a></li>
                    <li><a href="#">Гайды</a></li>
                    <li><a href="#">Обзоры</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>