<?php if(isset($error_content)):?><?=$error_content?> <?php endif; ?>
<form method='POST' action='/posts/p_add'>

    <label for='content'>New Post:</label><br>
    <textarea name='content' id='content' maxlength="250"></textarea>

    <br><br>
    <input type='submit' value='New post'>

</form>

