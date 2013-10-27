<!DOCTYPE html>
<html>
<head>
    <title><?php if(isset($title)) echo $title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Controller Specific JS/CSS -->
    <?php if(isset($client_files_head)) echo $client_files_head; ?>

</head>

<body>
<form method="POST" action="/users/p_signup">

    First Name<br>
    <input type='text' name='first_name'>
    <br><br>

    Last Name<br>
    <input type='text' name='last_name'>
    <br><br>

    Email<br>
    <input type='text' name='email_id'>
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>

    <input type='submit' value='Sign up'>

</form>
</body>
</html>
