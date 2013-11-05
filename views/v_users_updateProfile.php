<?php if(isset($_GET['profilesuccess'])): ?>
    Profile has been updated successfully.
<?php endif; ?>

<form method="POST" action="/users/p_updateProfile">
    <div id="contentWithNav" class="schedule">
        <p>  <?php if(isset($error)):?>User with this email id already exists <?php endif; ?> </p>
        <table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >
            <tr>
                <td colspan="3">
                    <h3>Welcome to Update Profile screen,&nbsp; <?php echo $user['first_name'];?>&nbsp; <?php echo $user['last_name'] ; ?> </h3>
                    <p> Please update the following information.  </p>
                    <?php if(isset($_GET['incomplete'])): ?>
                        First name and Last name are required fields.
                    <?php endif; ?>


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
                        <tr>
                            <td>
                                <label>Email ID</label>
                                <?php echo $user['email_id']; ?>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <p class="buttonPanel">
                <input type="submit" value="Update Profile" />&nbsp;&nbsp;&nbsp;
                <input type="reset" value="Reset"  />
            </p>

        </table>
</form>
<form method="POST" action="/users/p_updatePassword">
<table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >


    <tr>
                <td colspan="3">
                    <h3> Reset  Password  </h3>
                    <?php if(isset($_GET['pwdincomplete'])): ?>
                        Password Fields are required fields.
                    <?php endif; ?>
                    <?php if(isset($_GET['pwdmatcherror'])): ?>
                        Password Fields are Not matching.
                    <?php endif; ?>
                    <?php if(isset($_GET['pwdsuccess'])): ?>
                        Password has been reset successfully.
                    <?php endif; ?>



                    <table cellspacing="0" cellpadding="5" border="0" class="candidateInfo">
                        <tr>
                            <td>
                                <label>New Password</label>
                                <input type='password' name='password' >

                            </td>
                            <td>
                                <label>Confirm New Password</label>
                                <input type='password' name='repwd' >

                            </td>
                        </tr>

                    </table>
                </td>
            </tr>

        </table>

        <p class="buttonPanel">
            <input type="submit" value="Update Password" />&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Reset"  />
        </p>
    </div>
</form>


