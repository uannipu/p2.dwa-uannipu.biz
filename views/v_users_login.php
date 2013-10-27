/**
 * Created by JetBrains PhpStorm.
 * User: UAnnipu
 * Date: 10/26/13
 * Time: 5:02 PM
 * To change this template use File | Settings | File Templates.
 */
<!DOCTYPE html>
<html>
<head>
    <title><?php if(isset($title)) echo $title; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- Controller Specific JS/CSS -->
<?php if(isset($client_files_head)) echo $client_files_head; ?>

</head>

<body>
<form method='POST' action='/users/p_login'>

    Email<br>
    <input type='text' name='email'>

    <br><br>

Password<br>
    <input type='password' name='password'>

    <br><br>
    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>

    <input type='submit' value='Log in'>

</form>
</body>
</html>