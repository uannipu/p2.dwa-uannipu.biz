<?php if(isset($error_content)):?><?=$error_content?> <?php endif; ?>

<?php if(isset($_GET['incomplete'])): ?>
    Incomplete registration
<?php endif; ?>

<form method="POST" name="editForm" action='/posts/p_edit/<?=$post?>'>
     <div id="contentWithNav" class="schedule">
        <p>  <?php if(isset($_GET['incomplete'])):?> Post cannot be empty <?php endif; ?> </p>
        <table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >
            <tr>
                <td colspan="3">
                    <h3>Edit Post</h3>
                    <p>  </p>

                    <table cellspacing="0" cellpadding="5" border="0" class="candidateInfo">
                        <tr>
                            <td colspan="3">
                                <label>Post : </label>
                                <textarea name='content' id='content' maxlength="250"><?=$posttext?></textarea>

                            </td>

                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <p class="buttonPanel">
            <input type="submit" value="Update Post" />&nbsp;&nbsp;&nbsp;

        </p>
    </div>
</form>


