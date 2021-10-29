<?php
require "config.php";
?>

<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="header_top_logo">
                <h1><?php echo $config['title'] ?></h1>
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

    <?php
    $categories_q = mysqli_query($connection, "SELECT * FROM `acticles_categories`");
    $categories = array();
    while ( $cat = mysqli_fetch_assoc($categories_q))
    {
        $categories[] = $cat;
    }
    ?>
    <div class="header_bottom">
        <div class="container">
            <nav>
                <ul>
                    <?php
                       foreach ($categories as $cat)
                       {
                        ?>
                        <li><a href="/articles.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></a></li>
                        <?php
                       }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>