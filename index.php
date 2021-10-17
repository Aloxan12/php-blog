<?php

$connection = mysqli_connect('localhost', 'root', '', 'blog-db');

if($connection == false)
{
    echo 'Не удалось подключиться к базе данных';
    echo mysqli_connect_error();
    die();
}

$result = mysqli_query($connection, 'SELECT * FROM `acticles_categories`');
?>
<ul>
    <?php
        while (($cat = mysqli_fetch_assoc($result)) )
        {
            echo '<li>' . $cat['title'] . '</li>';
        }
    ?>
</ul>
<?php
    mysqli_close($connection);
?>
