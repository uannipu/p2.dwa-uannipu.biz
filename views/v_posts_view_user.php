<?php if(isset($_GET['deletesuccess'])): ?>
<div class="success"> Delete Successful </div>
<?php endif; ?>
<?php if(isset($_GET['editsuccess'])): ?>
  <div class="success"> Update is Successful </div>
<?php endif; ?>



<form method="POST" action="">
    <div id="contentWithNav" class="homepage">
        <div class="description">
            <h1>View My Posts </h1>
            <p> </p>
        </div>
        <div>
        <div class="success">
            <?php if(isset($view_posts) && count($view_posts)== 0): ?>
            <p>    You have no topics posted so far. Please use the left nav bar and add topics. </p>
            <?php endif; ?>

        </div>
            <table cellspacing="0" cellpadding="0" border="0" align="center" id="scheduleInfo">
                <tr>
                    <td id="currentSchedule"  class="tableData">

                        <p> <?php if($user) echo $user->first_name. ' '.$user->last_name ?>&nbsp; posted:</p>
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

