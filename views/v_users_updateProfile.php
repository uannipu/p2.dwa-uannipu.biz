<form method="POST" action="/users/p_updateProfile">
    <div id="contentWithNav" class="schedule">
        <p>  <?php if(isset($error)):?>User with this email id already exists <?php endif; ?> </p>
        <table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >
            <tr>
                <td colspan="3">
                    <h3>Update Profile</h3>
                    <p> Please update the following information.  </p>

                    <table cellspacing="0" cellpadding="5" border="0" class="candidateInfo">
                        <tr>
                            <td>
                                <label>First Name</label>
                                <input type='text' name='first_name' value="<?php echo $user['first_name']; ?>">
                                <?php if(isset($error_first_name)):?><?=$error_first_name?> <?php endif; ?>
                            </td>
                            <td>
                                <label>Last Name</label>
                                <input type='text' name='last_name' value="<?php echo $user['last_name']; ?>">
                                <?php if(isset($error_last_name)):?><?=$error_last_name?> <?php endif; ?>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

        </table>
        <p class="buttonPanel">
            <input type="submit" value="Update Profile" />&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Reset"  />
        </p>
    </div>
</form>


