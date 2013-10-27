<?php
/**
 * Created by JetBrains PhpStorm.
 * User: UAnnipu
 * Date: 10/25/13
 * Time: 11:53 PM
 * To change this template use File | Settings | File Templates.
 */

class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    }

    public function signup() {

        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title   = "Sign Up";

        # Render template
        echo $this->template;

    }

    public function p_signup() {

        # Dump out the results of POST to see what the form submitted
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }


        public function profile($user_name = NULL) {

            /*
            If you look at _v_template you'll see it prints a $content variable in the <body>
            Knowing that, let's pass our v_users_profile.php view fragment to $content so
            it's printed in the <body>
            */
            $this->template->content = View::instance('v_users_profile');

            # $title is another variable used in _v_template to set the <title> of the page
            $this->template->title = "Profile";

            # Pass information to the view fragment
            $this->template->content->user_name = $user_name;

            # Render View
            echo $this-template;

        }


} # eoc