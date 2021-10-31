


<?php
require "config.php";
?>



<div class="block">
    <h3>Коментарии</h3>
    <div class="block__content">
        <div class="articles articles__vertical">
            <?php
            $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `views` DESC LIMIT 5");

            while ($comment = mysqli_fetch_assoc($comments))
            {
                ?>
                <article class="article">
<!--                    <div class="article_image" style="background-image: url(-->
<!--                            /static/images/--><?php //echo $art['image']; ?>/*);">*/
/*                    </div>*/
                    <div class="article_info">
                        <a href="/article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo
                            $comment['author']; ?></a>
                        <div class="article_info_meta"></div>
                        <div class="article_info_preview"><?php echo mb_substr(strip_tags($comment['text']),
                                0, 100, 'utf-8'). '...'; ?></div>
                    </div>
                </article>
                <?php
            }
            ?>
        </div>
    </div>
</div>