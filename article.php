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
    <link rel="stylesheet" href="../media/css/style.css">
</head>
<body>
<div id="wrapper">
    <?php include "includes/header.php"; ?>

    <?php
    $article = mysqli_query($connection, "SELECT * FROM `acticles` WHERE `id` =" . (int)$_GET['id']);

    if (mysqli_num_rows($article) <= 0) {
        ?>
        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content_left col-md-8">
                        <div class="block">
                            <h3>Статься не найдена</h3>
                            <div class="block_content">
                                <div class="full-text">
                                    Такой статьи нет
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php
    } else {
    $art = mysqli_fetch_assoc($article);
    mysqli_query($connection, "UPDATE `acticles` SET `views` = `views` + 1 WHERE `id` = " . (int)$art['id']);
    ?>
    <div id="content">
        <div class="container">
            <div class="row">
                <section class="content_left col-md-8">
                    <div class="block">
                        <a> <?php echo $art['views']; ?> просмотров</a>
                        <h3><?php echo $art['title']; ?></h3>
                        <div class="block_content">
                            <img src="static/images/<?php echo $art['image']; ?>">
                            <div class="full-text">
                                <?php echo $art['text']; ?>
                            </div>
                        </div>
                    </div>

                    <div class="block">
                        <h3>Коментарии</h3>
                        <div class="block__content">
                            <div class="articles articles__vertical">
                                <?php
                                $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` =" . (int) $art['id'] . " ORDER BY `id` DESC");
                                if (mysqli_num_rows($comments) <= 0) 
                                {
                                    echo 'Нет комментариев';
                                }
                                while ($comment = mysqli_fetch_assoc($comments))
                                {
                                ?>
                                <article class="article">
                            <div class="article_info">
                                <a href="/article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo
                                    $comment['author']; ?></a>
                                <div class="article_info_meta"></div>
                                <div class="article_info_preview"><?php echo $comment['text']; ?></div>
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
<?php
}
?>
<?php include "includes/footer.php"; ?>
</div>
</body>
</html>