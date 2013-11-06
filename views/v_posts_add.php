<?php if(isset($error_content)):?><div class='error'><?=$error_content?></div> <?php endif; ?>

<form method="POST"  action='/posts/p_add'>
    <div id="contentWithNav" class="schedule">
        <div class="error" > <?php if(isset($_GET['incomplete'])):?> Topic cannot be empty <?php endif; ?> </div>
        <table class="tableData"  >
            <tr>
                <td>
                    <h3>New Topic</h3>
                    <p>  </p>

                    <table class="candidateInfo">
                        <tr>
                            <td>
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



