
<form method='POST' action='/users/p_login'>
  <!--  <?php //if(isset($error)): ?>
        <?php //print_r($error)?>
        <div class='error'>
            User already exists. Please login with your email id and password.
        </div>
        <br>
    <?php //endif; ?>
-->
    <div id="contentWithNav" class="schedule">
        <table cellspacing="0" cellpadding="0" border="0" align="center"  class="tableData"  >
            <tr>
                <td colspan="3">
                    <h3>Login</h3>
                    <p> Please enter the following information.</p>
                    <table cellspacing="0" cellpadding="5" border="0" class="candidateInfo">
                     <tr>

                            <td>
                                <label>Email</label>
                                <input type='text' name='email'>

                            </td>
                            <td>
                                <label>Password</label>
                                <input type='password' name='password'>
                            </td>
                        </tr>

                        <!--   <tr>
                                   <td>
                                       <label>Password</label>
                                       <input type='password' name='password'>
                                   </td>
                                   <td>
                                       <label>Retype Password</label>
                                       <input type='password' name='repwd'>
                                   </td>
                        </tr> -->
                    </table>
                </td>
            </tr>

        </table>
        <p class="buttonPanel">
            <input type="submit" value="login" />&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Reset"  />
        </p>

        <?php if(isset($error)): ?>
            <?php print_r($error)?>
            <div class='error'>
                Login failed. Please double check your email and password.
            </div>
            <br>
        <?php endif; ?>
    </div>
</form>


