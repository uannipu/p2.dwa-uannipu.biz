<!DOCTYPE html>
<html>
<head>

</head>

<body>
<h1> <?php echo $view_posts[0]['first_name']; ?> is posting..</h1>
<?php foreach($view_posts as $post): ?>

    <article>


        <a href="/posts/edit/<?php echo $post['post_id']; ?>"<p><?=$post['content']?></p></a> &nbsp; <a href="/posts/delete/<?php echo $post['post_id']; ?>">delete</a>

        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
            <?=Time::display($post['created'])?>
        </time>

    </article>

<?php endforeach; ?>
</form>
</body>
</html>
