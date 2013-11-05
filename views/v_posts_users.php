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
            <table cellspacing="0" cellpadding="0" border="0" align="center" id="scheduleInfo">
                <tr>
                    <td id="currentSchedule"  class="tableData">
                        <h3>View All Users</h3>
                        <p>Follow or un follow the users by clicking the links:</p>
                        <table cellspacing="2" cellpadding="5" border="0" width="100%">
                            <tr>
                                <th>User</th>
                                <th>Follow/UnFollow</th>
                              </tr>
                            <?php $classvar="" ; $i=0;?>
                            <?php foreach($users as $user): ?>
                                <?php if ($i % 2 == 1) $classvar = "oddRow"; else $classvar="evenRow"; ?>
                                <tr class="<?php echo $classvar ?>">

                                    <td><?=$user['first_name']?> <?=$user['last_name']?></td>
                                    <td>   <?php if(isset($connections[$user['user_id']])): ?>
                                            <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>

                                            <!-- Otherwise, show the follow link -->
                                        <?php else: ?>
                                            <a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
                                        <?php endif; ?>
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






