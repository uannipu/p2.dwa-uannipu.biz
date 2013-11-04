<h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
<?php if(isset($message)):?><?=$message?> <?php endif; ?>

