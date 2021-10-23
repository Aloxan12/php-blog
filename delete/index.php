<?php

include('db.php');

$result = mysqli_query($connection, 'SELECT * FROM `acticles_categories`');
?>

<form method="POST" action="/delete/handle.php">
    <input type="text" placeholder="Ваш логин" name="login">
    <input type="text" placeholder="Ваш пароль" name="password">
    <hr>
    <input type="button" value="Отправить">
</form>

<ul>
    <?php
        while (($cat = mysqli_fetch_assoc($result)) )
        {
            $article_count = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `acticles` WHERE `categories_id` =" . $cat['id']);
            $article_count_result = mysqli_fetch_assoc($article_count);
            echo '<li>' . $cat['title'] . ' ('. $article_count_result['total_count']. ')</li>';
        }
    ?>
</ul>

