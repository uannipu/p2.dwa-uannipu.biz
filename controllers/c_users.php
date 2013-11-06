<?php

class users_controller extends base_controller {

public function __construct() {
parent::__construct();
}

public function signup($error = NULL) {

# Setup view
$this->template->content = View::instance('v_users_signup');
$this->template->title   = "Sign Up";
$this->template->content->error   = $error;
echo $error;
# Render template
echo $this->template;

}

public function p_signup() {
    /*
        $email = $_POST['email_id'];
        echo 'email'.$email;


      //  if($email == '' || FILTER_VALIDATE_EMAIL) {
        //    Router::redirect('/users/signup/?msg=email is invalid');
        //}
        echo 'email valid';
        $emailquery = "SELECT email_id from users where email_id = '".$_POST['email_id']."'";
        echo 'query : '.$emailquery ;

       If (!validateEmail($_POST['email_id'])) {
            $this->template->email_error = "Invalid Email address… Pls. enter a valid one";
            Router::redirect('/users/signup'); // Redirect back to same page
        }
    */
    foreach($_POST as $key => $value){
        if((!isSet($value) || (!$value) || ($value = ""))){
            Router::redirect('/users/signup/?incomplete');
        }
    }


    $this->template->content = View::instance('v_users_signup');
    if (strlen($_POST['first_name']) < 1) {
        $this->template->content->error_first_name = "First Name is invalid.";
        $flg ='true';
     }

    if (strlen($_POST['last_name']) < 1) {
        $this->template->content->error_last_name = "Last Name is invalid.";
        $flg = 'true';
     }
    if (strlen($_POST['password']) < 1) {
        $this->template->content->error_password = "password is invalid.";
        $flg = 'true';
    }
    if (strlen($_POST['email_id']) < 1) {
        $this->template->content->error_email_id = "Email id is invalid.";
        $flg = 'true';
    }

    if(isset($_POST['password'],$_POST['repwd'])){
        if($_POST['password'] != $_POST['repwd']){
            $this->template->content->error_pwd_chk = "passwords don't match";
            $flg = 'true';
        }
    }
    if(isset($flg) && $flg=='true'){
       echo $this->template;
        return;
    }



    /*  foreach($_POST as $key => $value){
              if((isSet($value) || (!$value) || ($value = ""))){
                  $error = 'incomplete';

                  $this->template->content = View::instance('v_users_signup');
                  $this->template->content->first_name = $_POST[$key];
                  $this->template->content->error_.$key = $key."is too short.";
                  $this->template->title   = "Sign Up";
                  echo $this->template;
                  return;
               //   $this->template->email_error = "Invalid Email address… Pls. enter a valid one";
               //   Router::redirect('/users/signup');
              }
          } */
    $emailquery = "SELECT email_id from users where email_id = '".$_POST['email_id']."'";
    //check if a user exists with the same email id
    $userExists = DB::instance(DB_NAME)->select_rows($emailquery);
    if(!empty($userExists)){
        $errstr='User already exists';
        echo $errstr;
        $error = 'userexists';
     //   $this->template->email_error = "Invalid Email address… Pls. enter a valid one";

        Router::redirect("/users/signup/error");
    } else {

        $_POST['created_date'] = Time::now();
        $_POST['last_modified_date'] = Time::now();

        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Create an encrypted token via their email address and a random string
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email_id'].Utils::generate_random_string());

        $data = Array('first_name'=>$_POST['first_name'], 'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'password'=>$_POST['password'],'email_id'=>$_POST['email_id'],
            'token'=>$_POST['token'],'created_date'=>$_POST['created_date'],'last_modified_date'=>$_POST['last_modified_date']);
        # Insert this user into the database
        $user_id = DB::instance(DB_NAME)->insert('users', $data);
        Router::redirect('/users/login');
    }
}


    # For now, just confirm they've signed up -
    # You should eventually make a proper View for this
    //echo 'You\'re signed up';


     public function login($error = NULL, $exists = NULL) {

        # Set up the view
        $this->template->content = View::instance("v_users_login");

        # Pass data to the view
        $this->template->content->error = $error;
        $this->template->content->exists = $exists;

        # Render the view
        echo $this->template;

    }

    public function p_login() {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token
        FROM users
        WHERE email_id = '".$_POST['email']."'
        AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # If we didn't find a matching token in the database, it means login failed
            if(!$token) {
                # Note the addition of the parameter "error"
                $error='loginerror';
                Router::redirect("/users/login/error");
                 # But if we did, login succeeded!
        } else {

            /*
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
            Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+1 year'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/posts");

        }
    }

        public function profile() {

            # If user is blank, they're not logged in; redirect them to the login page
            if(!$this->user) {
                Router::redirect('/users/login');
            }

            # If they weren't redirected away, continue:

            # Setup view
            $this->template->content = View::instance('v_users_profile');
            $this->template->title   = "Profile of".$this->user->first_name;

            # Render template
            echo $this->template;
        }



    public function logout() {
        if(!$this->user){
            Router:http_redirect('/users/login');
        } else {

        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email_id.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
        # DB::instance(DB_NAME)->update("users", $data, 'WHERE user_id= '.$this->user>user_id);

        # token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");
        }

    }

    public function updateProfile($user = NULL) {
        if(!$this->user){
            Router:http_redirect('/users/login');
        } else {
            $this->template->content = View::instance(('v_users_updateProfile'));
            $this->template->title = "Update Profile";
            $user_id = $this->user->user_id;
            $q = "SELECT * from users WHERE user_id = $user_id";
            $user = DB::instance(DB_NAME)->select_row($q);
            $this->template->content->user = $user;
            echo $this->template;
        }

    }

    public function p_updateProfile($user = NULL) {

        if(!$this->user){
            Router:http_redirect('/users/login');
        } else {

                foreach($_POST as $key => $value){
                    if((!isSet($value) || (!$value) || ($value = ""))){
                        print_r($_POST);
                       Router::redirect('/users/updateProfile/?incomplete');
                    }
                }
            $user_id = $this->user->user_id;
            $modified = $_POST['last_modified_date'] = Time::now();
            $data = Array('first_name'=>$_POST['first_name'], 'last_name'=>$_POST['last_name']);
            DB::instance(DB_NAME)->update("users",$data,"WHERE user_id = $user_id");
         //

            Router::redirect('/users/updateProfile/?profilesuccess');
        }

    }
    public function p_updatePassword($user = NULL) {

        if(!$this->user){
            Router:http_redirect('/users/login');
        } else {

                foreach($_POST as $key => $value){
                    if((!isSet($value) || (!$value) || ($value = ""))){
                       Router::redirect('/users/updateProfile/?pwdincomplete');
                    }
                }
                if(isset($_POST['password'],$_POST['repwd'])){
                    if($_POST['password'] != $_POST['repwd']){
                        Router::redirect('/users/updateProfile/?pwdmatcherror');
                    }
                }
            $user_id = $this->user->user_id;
            $modified = $_POST['last_modified_date'] = Time::now();
            $pwd = sha1(PASSWORD_SALT.$_POST['password']);
            $data = Array('password'=> $pwd);
            DB::instance(DB_NAME)->update("users",$data,"WHERE user_id = $user_id");
            Router::redirect('/users/updateProfile/?pwdsuccess');
        }

    }


} # eoc