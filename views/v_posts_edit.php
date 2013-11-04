<?php if(isset($error_content)):?><?=$error_content?> <?php endif; ?>

<form method='POST' action='/posts/p_edit/<?php echo $post; ?>'>
    <label for='content'>Edit Post:</label><br>
    <textarea name='content' id='content' maxlength="250"><?=$posttext?></textarea>

    <br><br>
    <input type='submit' value='Update'>

</form>
