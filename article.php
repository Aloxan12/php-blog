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
    <link rel="stylesheet" href="/media/css/style.css">
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
                            <a href="#comment-add-form">Добавить свой</a>
                            <h3>Коментарии</h3>
                            <div class="block__content">
                                <div class="articles articles__vertical">
                                    <?php
                                    $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` =" . (int)$art['id'] . " ORDER BY `id` DESC");
                                    if (mysqli_num_rows($comments) <= 0) {
                                        echo 'Нет комментариев';
                                    }
                                    while ($comment = mysqli_fetch_assoc($comments)) {
                                        ?>
                                        <article class="article">
                                            <div class="article_info">
                                                <div class="article_image"
                                                     style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email']); ?>);"></div>
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

                        <div id="comment-add-form" class="block">
                            <h3>Добавить комментарий</h3>
                            <div class="block__content">
                                <form class="form" method="POST" action="/article.php?id=<?php echo $art['id'];?>">
                                    <?php
                                        if( isset($_POST['do_post']) )
                                        {
                                            $errors = array();

                                            if( $_POST['name'] == '')
                                            {
                                                $errors[] = 'Введите ваше имя';
                                            }
                                            if( $_POST['nickname'] == '')
                                            {
                                                $errors[] = 'Введите ваш никнэйм';
                                            }
                                            if( $_POST['email'] == '')
                                            {
                                                $errors[] = 'Введите ваш email';
                                            }
                                            if( $_POST['text'] == '')
                                            {
                                                $errors[] = 'Введите текст комментария';
                                            }

                                            if (empty($errors))
                                            {
                                                //Ваш коммент
                                                echo '<span style="color: green; font-weight: bold; margin-bottom: 10px; display: block">Комментарий успешно добавлен</span>';
                                            }else
                                            {
                                                //Вывод ошибки
                                                echo '<span style="color: red; font-weight: bold; margin-bottom: 10px; display: block">' . $errors[0] . '</span>';
                                            }
                                        }
                                    ?>
                                    <div class="form_group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" name="name" class="form_control"
                                                placeholder="Имя" value="<?php echo $_POST['name']; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="nickname" class="form_control"
                                                       placeholder="Никнэйм" value="<?php echo $_POST['nickname']; ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="email" class="form_control"
                                                       placeholder="Email(не будет показан)" value="<?php echo $_POST['email']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form_group">
                                        <textarea class="form_control" name="text" placeholder="Текст комментарияююю">
                                            <?php echo $_POST['text']; ?>
                                        </textarea>
                                    </div>
                                    <div class="form_group">
                                        <input type="submit" name="do_post" value="Добавить комментарий" class="form_control">
                                    </div>
                                </form>
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