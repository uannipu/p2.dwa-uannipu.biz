<?php if(isset($_GET['incomplete'])): ?>
    Incomplete registration
<?php endif; ?>

<?php if(isset($_GET['deletesuccess'])): ?>
    Delete Successful
<?php endif; ?>
<?php if(isset($_GET['editsuccess'])): ?>
    Edit Successful
<?php endif; ?>

<form method="POST" action="">
    <div id="contentWithNav" class="homepage">
        <div class="description">
            <h1>View My Posts </h1>
            <p> </p>
        </div>
        <div>

            <table cellspacing="0" cellpadding="0" border="0" align="center" id="scheduleInfo">
                <tr>
                    <td id="currentSchedule"  class="tableData">

                        <p> <?php echo $view_posts[0]['first_name']; ?> posted:</p>
                        <table cellspacing="2" cellpadding="5" border="0" width="100%">
                            <tr>
                                <th>Post Content</th>
                                <th>Edit</th>
                                 <th>Time</th>
                            </tr>
                            <?php $classvar="" ; $i=0;?>
                            <?php foreach($view_posts as $post): ?>
                                <?php if ($i % 2 == 1) $classvar = "oddRow"; else $classvar="evenRow"; ?>
                                <tr class="<?php echo $classvar ?>">

                                    <td> <a href="/posts/edit/<?php echo $post['post_id']; ?>"><?=$post['content']?></a>
                                    </td>
                                    <td><a href="/posts/edit/<?php echo $post['post_id']; ?>">edit</a></td>
                                    <td><a href="/posts/p_delete/<?php echo $post['post_id']; ?>">delete</a></td>
                                    <td>  <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
                                            <?=Time::display($post['created'])?>
                                        </time>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>

