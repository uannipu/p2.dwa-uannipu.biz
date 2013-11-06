   <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>
   <?php if(isset($_GET['loginsuccess'])): ?>
       <div class="success"> Registration is Successful! Please login.</div>
   <?php endif; ?>

   <div id="contentWithNav" class="login">
        <form method='POST' action='/users/p_login'>
        <div class="form">
            <p>
                <label>Email: </label>
                <input type="text" name="email" size="30"  maxlength="250"/>
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="password" size="30" maxlength="250" />
            </p>
            <p class="buttonPanel">
                <input type="submit" value="Login" id="loginButton" />
            </p>
        </div>

        </form>
</div>
    <div class="description">
        <h1>Welcome to the Testing Site</h1>
        <p> This testing site is forum to share your experience and tips with various tests that we offer, helps you prepare ahead of the tests.
        </p>
        <p>This site allows users to register, follow other users, post a topic regarding various testing programs that we currently support, such as GRE, TOEFL,SAT etc..</p>
    </div>
    <table id="details">
        <tr>
            <td> The +1 features that I added are "Edit a post", "Delete a post", "Update Profile".</td>
            <td> This is strictly for testing purposes and not for any other business purposes.</td>
            <td>If you are looking for another testing program, this is probably not the right web site that you are looking for.</td>
        </tr>
    </table>
