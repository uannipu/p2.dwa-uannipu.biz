<?php
/**
 * Created by JetBrains PhpStorm.
 * User: UAnnipu
 * Date: 10/29/13
 * Time: 11:39 PM
 * To change this template use File | Settings | File Templates.
 */
class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
           die("Members only. <a href='/users/login'>Login</a>");
        }
    }

    public function add() {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
       # echo " I am here ";
        # Setup view
        $this->template->content = View::instance('v_posts_add');
        $this->template->title   = "New Post";

        # Render template
         echo $this->template;
        }
    }

    public function p_add() {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
                    $user = $this->user->user_id;
                # Associate this post with this user
                $_POST['user_id']  = $user;

                # Unix timestamp of when this post was created / modified
                $_POST['created']  = Time::now();
                $_POST['modified'] = Time::now();

                    if(strlen($_POST['content']) < 1 ){
                            $this->template->content = View::instance('v_posts_add');
                            $this->template->title = "Add post";
                            $this->template->content->error_content="Topic cannot be empty";
                            echo $this->template;
                            return;
                     } else {

                            # Insert
                    # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
                    DB::instance(DB_NAME)->insert('user_posts', $_POST);
                    Router::redirect("/posts/user/add/".$user);
                    # Quick and dirty feedback
                    }
        }
    }

    public function index() {

            if(!$this->user) {
                Router::redirect('/users/login');
            } else {

                    # Set up the View
            $this->template->content = View::instance('v_posts_index');
            $this->template->title   = "All Posts";
                    $user_id = $this->user->user_id;

                # Query
                $q = 'SELECT
                    posts.content,
                    posts.created,
                    posts.user_id AS post_user_id,
                    users_users.user_id AS follower_id,
                    users.first_name,
                    users.last_name
                FROM user_posts posts
                INNER JOIN users_users
                    ON posts.user_id = users_users.user_id_followed
                INNER JOIN users
                    ON posts.user_id = users.user_id
                WHERE users_users.user_id ='.$user_id .' order by posts.post_id DESC';

                # Run the query, store the results in the variable $posts
                $posts = DB::instance(DB_NAME)->select_rows($q);

                # Pass data to the View
                $this->template->content->posts = $posts;

                # Render the View
                echo $this->template;
            }
    }

    public function users() {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
       $current_user = $this->user->user_id;

        # Set up the View
        $this->template->content = View::instance("v_posts_users");
        $this->template->title   = "Users";

        # Build the query to get all the users
        $q = "SELECT *
        FROM users";

        # Execute the query to get all the users.
        # Store the result array in the variable $users
        $users = DB::instance(DB_NAME)->select_rows($q);

        # Build the query to figure out what connections does this user already have?
        # I.e. who are they following
        $q = "SELECT *
        FROM users_users
        WHERE user_id = ".$this->user->user_id;

        # Execute this query with the select_array method
        # select_array will return our results in an array and use the "users_id_followed" field as the index.
        # This will come in handy when we get to the view
        # Store our results (an array) in the variable $connections
        $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

        # Pass data (users and connections) to the view
        $this->template->content->users       = $users;
        $this->template->content->connections = $connections;

        # Render the view
        echo $this->template;
        }
    }

    public function user($user = NULL, $connections = NULL) {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

            # Set up the View
        $this->template->content = View::instance("v_posts_view_user");
        $this->template->title   = "View user posts";
        $current_user = $this->user->user_id;
     /*   if($this -> user){
            $current_user = $this->user->user_id;
            $user_connections = "SELECT * FROM users_users WHERE user_id = $current_user AND user_id_followed =$user";
            $connections = DB::instance(DB_NAME)->select_rows($user_connections);
            $this->template->content->connections = $connections;
        }
*/
        # Build the query to get all the users
       /* $q = "SELECT posts.*, users.first_name, users.last_name FROM user_posts posts
                LEFT JOIN users ON ( posts.user_id = users.user_id)
                WHERE posts.user_id = $current_user ORDER BY posts.post_id DESC";
       */
        $q = "SELECT posts.*, users.first_name, users.last_name FROM user_posts posts, users
                WHERE posts.user_id = users.user_id and posts.user_id = $current_user ORDER BY posts.post_id DESC";

        $view_posts = DB::instance(DB_NAME) ->select_rows($q);
        $this ->template->content->view_posts = $view_posts;
        echo $this->template;
        }
    }

    public function edit($post = NULL) {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

            $user = $this->user->user_id;
        $q = "select * from user_posts where post_id = $post and user_id = $user" ;
        # Do the insert
        $posts = DB::instance(DB_NAME)->select_row($q);
        if(!empty($posts)){
            $this->template->content = View::instance('v_posts_edit');
            $this->template->title = "Edit post";
            $this->template->content->posts = $posts;
            $this->template->content->post=$post;
            $this->template->content->posttext=$posts['content'];
            echo $this->template;
        }
         # Send them back
        //Router::redirect("/posts/users");
        }
    }
    public function p_edit($post = NULL) {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

        $user = $this->user->user_id;
        $q = "select * from user_posts where post_id = $post and user_id = $user" ;
        # Do the insert
        $posts = DB::instance(DB_NAME)->select_row($q);
        if(!empty($posts)){
            if(strlen($_POST['content']) < 1 ){
                $this->template->content = View::instance('v_posts_edit');
                $this->template->title = "Edit post";
                $this->template->content->posts = $posts;
                $this->template->content->post=$post;
                $this->template->content->posttext='';
                $this->template->content->error_content="Topic cannot be empty";
                echo $this->template;
                return;
            } else {
                $modified = $_POST['modified'] = Time::now();
                $data = Array('content'=>$_POST['content'],'modified'=>$modified);
                DB::instance(DB_NAME)->update("user_posts",$data,"WHERE post_id = $post");
                    Router::redirect("/posts/user/".$user."/?editsuccess");
            }
        }

        # Send them back
        //Router::redirect("/posts/users");

        }
    }

    public function follow($user_id_followed) {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

            # Prepare the data array to be inserted
        $data = Array(
            "created" => Time::now(),
            "user_id" => $this->user->user_id,
            "user_id_followed" => $user_id_followed
        );

        # Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);

        # Send them back
        Router::redirect("/posts/users");
        }

    }

    public function unfollow($user_id_followed) {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

        # Delete this connection
        $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
        DB::instance(DB_NAME)->delete('users_users', $where_condition);

        # Send them back
        Router::redirect("/posts/users");
        }
    }
    public function p_delete($post = NULL) {
        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

        $user = $this->user->user_id;
        $q = "select * from user_posts where post_id = $post and user_id = $user" ;
        # Do the insert
        echo $q;
        $posts = DB::instance(DB_NAME)->select_row($q);
        if(!empty($posts)){
            DB::instance(DB_NAME)->delete("user_posts","WHERE post_id = $post");
            Router::redirect("/posts/user/".$user."/?deletesuccess");
       /*   } else {
                $modified = $_POST['modified'] = Time::now();
                $data = Array('content'=>$_POST['content'],'modified'=>$modified);
                DB::instance(DB_NAME)->update("user_posts",$data,"WHERE post_id = $post");
                Router::redirect("/posts/user/".$user);
          }
        */
        }
        # Send them back
        //Router::redirect("/posts/users");

    }
    }
}