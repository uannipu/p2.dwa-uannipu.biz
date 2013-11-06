<?php if(isset($_GET['profilesuccess'])): ?>
   <div class="success" > Profile has been updated successfully.</div>
<?php endif; ?>
<div id="contentWithNav" class="schedule">

    <form method="POST" action="/users/p_updateProfile">

            <table class="tableData"  >
                <tr>
                    <td>
                        <h3>Welcome to Update Profile screen,&nbsp; <?php echo $user['first_name'];?>&nbsp; <?php echo $user['last_name'] ; ?> </h3>
                        <p> Please update the following information.  </p>
                        <?php if(isset($_GET['incomplete'])): ?>
                           <div class="error"> First name and Last name are required fields.</div>
                        <?php endif; ?>
                        <table class="candidateInfo">
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
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Update Profile" /> &nbsp;&nbsp;&nbsp;
                                    <input type="reset" value="Reset"  />
                                </td>
                                <td></td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
    </form>
    <form method="POST" action="/users/p_updatePassword">
        <table  class="tableData"  >
            <tr>
                <td>
                    <h3> Reset  Password  </h3>
                        <?php if(isset($_GET['pwdincomplete'])): ?>
                              <div class="error">  Password Fields are required fields.</div>
                        <?php endif; ?>
                        <?php if(isset($_GET['pwdmatcherror'])): ?>
                              <div class="error">   Password Fields are Not matching.</div>
                        <?php endif; ?>
                        <?php if(isset($_GET['pwdsuccess'])): ?>
                              <div class="success"> Password has been reset successfully.</div>
                        <?php endif; ?>
                        <table class="candidateInfo">
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
                            <tr>
                                <td>
                                    <p class="buttonPanel">
                                        <input type="submit" value="Update Password" />&nbsp;&nbsp;&nbsp;
                                        <input type="reset" value="Reset"  />
                                    </p>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                </td>
            </tr>
        </table>
    </form>
</div>


