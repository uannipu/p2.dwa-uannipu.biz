<div class="error"> <?php if(isset($error_content)):?><?=$error_content?> <?php endif; ?> </div>


<form method="POST" name="editForm" action='/posts/p_edit/<?=$post?>'>
     <div id="contentWithNav" class="schedule">
     <table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >
            <tr>
                <td colspan="3">
                    <h3>Edit Topic:</h3>
                    <p>  </p>

                    <table cellspacing="0" cellpadding="5" border="0" class="candidateInfo">
                        <tr>
                            <td colspan="3">
                                <label>Topic : </label>
                                <textarea name='content' id='content' maxlength="250"><?=$posttext?></textarea>

                            </td>

                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <p class="buttonPanel">
            <input type="submit" value="Update Topic" />
        </p>
    </div>
</form>


