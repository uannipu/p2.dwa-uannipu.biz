<?php if(isset($error_content)):?><div class='error'><?=$error_content?></div> <?php endif; ?>

<form method="POST"  action='/posts/p_add'>
    <div id="contentWithNav" class="schedule">
        <p>  <?php if(isset($_GET['incomplete'])):?> Topic cannot be empty <?php endif; ?> </p>
        <table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >
            <tr>
                <td colspan="3">
                    <h3>New Topic</h3>
                    <p>  </p>

                    <table cellspacing="0" cellpadding="5" border="0" class="candidateInfo">
                        <tr>
                            <td colspan="3">
                                <label>Topic : </label>
                                <textarea name='content' id='content' maxlength="250"></textarea>

                            </td>

                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <p class="buttonPanel">
            <input type="submit" value="Add Topic" />
            <input type="reset" value="Reset" />
        </p>
    </div>
</form>



