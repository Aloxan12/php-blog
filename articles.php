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
                        <h3>Все статьи</h3>
                        <div class="block_content">
                            <div class="articles articles_horizontal">

                                <?php
                                $per_page = 4;
                                $page = 1;

                                if(isset($_GET['page']) )
                                {
                                    $page = (int) $_GET['page'];
                                }

                                $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `acticles`");
                                $total_count = mysqli_fetch_assoc($total_count_q);
                                $total_count = $total_count['total_count'];

                                $total_pages = ceil($total_count / $per_page);
                                if($page <= 1 || $page > $total_pages)
                                {
                                    $page = 1;
                                }
                                $offset = ($per_page * $page) - $per_page;
//                                if($page != 0)
//                                {
//                                    $offset = $per_page * $page;
//                                }
                                $articles = mysqli_query($connection, "SELECT * FROM `acticles` ORDER BY `id` DESC LIMIT $offset,$per_page");

                                $articles_exist = true;
                                if(mysqli_num_rows($articles) <= 0)
                                {
                                    echo 'Статей нет!';
                                    $articles_exist = false;
                                }

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
                            <?php
                            if($articles_exist == true)
                            {
                                echo '<div class="paginator">';
                                if($page > 1)
                                {
                                    echo '<a href="/articles.php?page='.($page - 1).'">Прошлая страница</a>';
                                }
                                if($page < $total_pages)
                                {
                                    echo '<a href="/articles.php?page='.($page + 1).'">Следующая страница</a>';
                                }
                                echo '</div>';
                            }
                            ?>
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