<form method="POST" action="/users/p_signup">
    <div id="contentWithNav" class="schedule">
      <p><div class='error'>
        <?php if(isset($error)):?>User with this email id already exists, please login. <?php endif; ?>  </div></p>
    <table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >
        <tr>
            <td colspan="3">
                <h3>Sign up</h3>
                <p> Please enter the following information.  </p>
                <?php if(isset($_GET['incomplete'])): ?>
                   <div class="error"> Incomplete registration, please fill in all the fields.</div>
                <?php endif; ?>
                <table cellspacing="0" cellpadding="5" border="0" class="candidateInfo">
                    <tr>
                        <td>
                            <label>First Name</label>
                            <input type='text' name='first_name'>
                            <div class="error">  <?php if(isset($error_first_name)):?><?=$error_first_name?> <?php endif; ?></div>
                        </td>
                        <td>
                            <label>Last Name</label>
                            <input type='text' name='last_name'>
                            <div class="error">   <?php if(isset($error_last_name)):?><?=$error_last_name?> <?php endif; ?> </div>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <label>Email</label>
                            <input type='text' name='email_id'>
                            <div class="error">   <?php if(isset($error_email_id)):?><?=$error_email_id?> <?php endif; ?> </div>

                        </td>
                        <td>
                            <label>Password</label>
                            <input type='password' name='password'>
                            <div class="error">    <?php if(isset($error_password)):?><?=$error_password?> <?php endif; ?> </div>
                        </td>
                    </tr>

                       <tr>

                               <td>
                                   <label>Retype Password</label>
                                   <input type='password' name='repwd'>
                                   <div class="error"> <?php if(isset($error_repwd)):?><?=$error_repwd?> <?php endif; ?> </div>
                                   <p><div class="error"> <?php if(isset($error_pwd_chk)):?><?=$error_pwd_chk?> <?php endif; ?> </div></p>
                               </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <p class="buttonPanel">
        <input type="submit" value="Sign Up" />&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Reset"  />
    </p>
    </div>
  </form>


