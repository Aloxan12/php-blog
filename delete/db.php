<?php

$connection = mysqli_connect('localhost', 'root', '', 'blog-db');

if($connection == false)
{
    echo 'Не удалось подключиться к базе данных';
    echo mysqli_connect_error();
    exit();
}
$test = 'hello';

?>