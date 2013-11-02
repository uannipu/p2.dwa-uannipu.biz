<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>
<body>

<div id='menu'>

    <a href='/'>Home</a>

    <!-- Menu for users who are logged in -->
    <?php if($user): ?>

        <a href='/users/logout'>Logout</a>
        <a href='/users/profile'>Profile</a>
        <a href='/posts'>Posts</a>
        <a href='/posts/add'>Add posts</a>
        <a href='/posts/follow'>Follow Users</a>
        <a href='/posts/unfollow'>Un follow Users</a>




        <!-- Menu options for users who are not logged in -->
    <?php else: ?>

        <a href='/users/signup'>Sign up</a>
        <a href='/users/login'>Log in</a>

    <?php endif; ?>

</div>

<br>

<?php if(isset($content)) echo $content; ?>

<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>