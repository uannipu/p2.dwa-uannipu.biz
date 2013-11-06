<!DOCTYPE html>
<html>
<head>
    <div id="container">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<title><?php if(isset($title)) echo $title; ?></title>
					
	<!-- Controller Specific JS/CSS -->
    <!--    <div id="header"><p><a href='/posts'>Posts</a></p></div> -->
    <div id="header"> <p>Testing Forum</p></div>
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>

    <!-- Menu for users who are logged in -->
    <?php if($user): ?>

 		<div id="nav">
			<ul>
				<li><a href='/posts'>Home</a></li>
				<li><a href='/users/updateProfile'>Update Profile</a></li>
				<li><a href='/posts/users'>Follow Users</a></li>
                <li><a href="/posts/user/".<?=$user->user_id;?>.">View My Topics</a></li>

                <li><a href='/posts/add'>Add topic</a></li>
                <li><a href='/users/logout'>Logout</a></li>

            </ul>
		</div>
        <!-- Menu options for users who are not logged in -->
    <?php else: ?>
<div id="nav">
			<ul>
				<li><a href='/users/signup'>Sign up</a></li>
				<li><a href='/users/login'>Log in</a></li>
     </div>
    <?php endif; ?>



<br>

<?php if(isset($content)) echo $content; ?>

<?php if(isset($client_files_body)) echo $client_files_body; ?>
<div id="footer"><p>&copy; Usha Annipu 2013</p>
    <a href="http://validator.w3.org/check?uri=referer"><img
            src="http://www.w3.org/Icons/valid-xhtml10"
            alt="Valid XHTML 1.0!" height="31" width="88" /></a>
</div>
</div>

</body>
</html>