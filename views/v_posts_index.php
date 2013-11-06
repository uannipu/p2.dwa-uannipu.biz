<?php if(isset($_GET['incomplete'])): ?>
    Incomplete registration
<?php endif; ?>

<form method="POST" action="/users/p_signup">
    <div id="contentWithNav" class="homepage">
        <div class="description">
            <h1>Welcome <?php if($user) echo ', '.$user->first_name . ' '.$user->last_name; ?> </h1>
            <p> </p>
        </div>
        <div>
        <p>  <?php if(isset($error)):?>User with this email id already exists <?php endif; ?> </p>
            <table id="scheduleInfo">
            <tr>
                <td id="currentSchedule"  class="tableData">
                    <h3>View Topics</h3>
                    <p>List of topics posted by the users that you follow:</p>
                    <table cellspacing="2" cellpadding="5" border="0" width="100%" >
                        <tr>
                            <th>Author name</th>
                            <th>Content</th>
                            <th>Time</th>
                        </tr>
                        <?php $classvar="" ; $i=0;?>
                        <?php foreach($posts as $post): ?>
                            <?php if ($i % 2 == 1) $classvar = "oddRow"; else $classvar="evenRow"; ?>
                            <tr class="<?php echo $classvar ?>">

                            <td><?=$post['first_name']?> <?=$post['last_name']?> posted:</td>
                            <td> <?=$post['content']?></td>
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


