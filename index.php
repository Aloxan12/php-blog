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
    <title><?php echo $config['title'] ?></title>
    <link rel="stylesheet" href="media/css/style.css">
</head>
<body>
<div id="wrapper">
    <?php include "includes/header.php"; ?>

    <div id="content">
        <div class="container">
            <div class="row">
                <section class="content_left col-md-8">
                    <div class="block">
                        <a href="articles.php">Все записи</a>
                        <h3>Новейшее в блоге</h3>
                        <div class="block_content">
                            <div class="articles articles_horizontal">

                                <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `acticles` 
                                    ORDER BY `id` DESC LIMIT 10");

                                while ($art = mysqli_fetch_assoc($articles)) {
                                    ?>
                                    <article class="article">
                                        <div class="article_image" style="background-image: url(
                                                /static/images/<?php echo $art['image']; ?>);">
                                        </div>
                                        <div class="article_info">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo
                                                $art['title']; ?></a>
                                            <div class="article_info_meta">
                                                <?php
                                                $art_cat = false;
                                                foreach ($categories as $cat) {
                                                    if ($cat['id'] == $art['categories_id']) {
                                                        $art_cat = $cat;
                                                        break;
                                                    }
                                                }
                                                ?>
                                                <small>Категория: <a
                                                            href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                                            </div>
                                            <div class="article_info_preview"><?php echo mb_substr(strip_tags($art['text']),
                                                    0, 100, 'utf-8'); ?></div>
                                        </div>
                                    </article>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="block">
                        <a href="articles.php?categorie=6">Все записи</a>
                        <h3>Безопасность [Новейшее]</h3>
                        <div class="block__content">
                            <div class="articles articles__horizontal">

                                <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `acticles` WHERE `categories_id` = 6
                                    ORDER BY `id` DESC LIMIT 10");

                                while ($art = mysqli_fetch_assoc($articles)) {
                                    ?>
                                    <article class="article">
                                        <div class="article_image" style="background-image: url(
                                                /static/images/<?php echo $art['image']; ?>);">
                                        </div>
                                        <div class="article_info">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo
                                                $art['title']; ?></a>
                                            <div class="article_info_meta">
                                                <?php
                                                $art_cat = false;
                                                foreach ($categories as $cat) {
                                                    if ($cat['id'] == $art['categories_id']) {
                                                        $art_cat = $cat;
                                                        break;
                                                    }
                                                }
                                                ?>
                                                <small>Категория: <a
                                                            href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                                            </div>
                                            <div class="article_info_preview"><?php echo mb_substr(strip_tags($art['text']),
                                                    0, 100, 'utf-8'); ?></div>
                                        </div>
                                    </article>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="block">
                        <a href="articles.php?categorie=4">Все записи</a>
                        <h3>Программирование [Новейшее]</h3>
                        <div class="block__content">
                            <div class="articles articles__horizontal">
                                <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `acticles` WHERE `categories_id` = 4
                                    ORDER BY `id` DESC LIMIT 10");

                                while ($art = mysqli_fetch_assoc($articles)) {
                                    ?>
                                    <article class="article">
                                        <div class="article_image" style="background-image: url(
                                                /static/images/<?php echo $art['image']; ?>);">
                                        </div>
                                        <div class="article_info">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo
                                                $art['title']; ?></a>
                                            <div class="article_info_meta">
                                                <?php
                                                $art_cat = false;
                                                foreach ($categories as $cat) {
                                                    if ($cat['id'] == $art['categories_id']) {
                                                        $art_cat = $cat;
                                                        break;
                                                    }
                                                }
                                                ?>
                                                <small>Категория: <a
                                                            href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                                            </div>
                                            <div class="article_info_preview"><?php echo mb_substr(strip_tags($art['text']),
                                                    0, 100, 'utf-8'); ?></div>
                                        </div>
                                    </article>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="block">
                        <h3>Топ читаемых статей</h3>
                        <div class="block__content">
                            <div class="articles articles__vertical">
                                <?php
                                $articles = mysqli_query($connection, "SELECT * FROM `acticles` ORDER BY `views` DESC LIMIT 5");

                                while ($art = mysqli_fetch_assoc($articles))
                                {
                                    ?>
                                    <article class="article">
                                        <div class="article_image" style="background-image: url(
                                                /static/images/<?php echo $art['image']; ?>);">
                                        </div>
                                        <div class="article_info">
                                            <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo
                                                $art['title']; ?></a>
                                            <div class="article_info_meta">
                                                <?php
                                                $art_cat = false;
                                                foreach ($categories as $cat) {
                                                    if ($cat['id'] == $art['categories_id']) {
                                                        $art_cat = $cat;
                                                        break;
                                                    }
                                                }
                                                ?>
                                                <small>Категория: <a
                                                            href="articles.php?categorie=<?php echo $art_cat['id']; ?>"><?php echo $art_cat['title']; ?></a></small>
                                            </div>
                                            <div class="article_info_preview"><?php echo mb_substr(strip_tags($art['text']),
                                                    0, 100, 'utf-8'); ?></div>
                                        </div>
                                    </article>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>
</div>
</body>
</html>