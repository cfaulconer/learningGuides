<?php

    function login($user, $pass){
        $db = Database::get();
        $collection = $db->users;
        $user = $collection->findOne(array('username'=>$user, 'password'=>$pass));
            
        if (isset($user['access'])){
            $access = $user['access'];
            $_SESSION['username']=$user['username'];
            
            //Update the Session ID in the db
            $sid = session_id();
            $newdata = array('$set' => array("session_id" => $sid));
            $result = $collection->update(array("username" => $user['username']),$newdata);
            
        }else{
            $access = 'guest';
            $_SESSION['error_msg'] = 'Could not find that username / password combination. Please try again.';
        }
        
        return $access;
    }

    function logout(){
        // remove all session variables
        session_unset(); 

        // destroy the session 
        session_destroy(); 
    }

    function auth($page){   
        //default to guest access, do not allow
        $allow = false;
        $user = array ('username' => 'guest', 'access'=>'guest');
        
        //Setup page level access
        $auth = array ('index.php'=>'guest',
                       'guide.php'=>'guest',
                       'edit.php'=>'user',
                       'login.php'=>'guest',
                       'logout.php' =>'guest',
                       'remove.php' => 'super',
                       'show-all.php' => 'super',
                       'load-data.php' => 'super',
                       'admin.php' => 'super'
                       );
        
        $hierarchy = array ('super' => 4,
                            'admin' => 3,
                            'contributor' =>2,
                            'user' => 1,
                            'guest' => 0);
        

        
        //Verify that the user is using the same session
        $sid = session_id();

        if (isset($_SESSION['username'])){
            if ($_SESSION['username'] != 'guest'){
                $username = $_SESSION['username'];
                $db = Database::get();
                $collection = $db->users;
                $user = $collection->findOne(array('username'=>$username));
            }
        }

        $page_access = $auth[$page];
        $user_access = $user['access'];

        $page_level = $hierarchy[$page_access];
        $user_level = $hierarchy[$user_access];
        
 

        if ($user_level >= $page_level) {
            //Grant access to page
            $allow = true;
        } else {
            $_SESSION['error_msg'] = 'You do not have access to view that page.';
        }           
        
        return $allow;
       
    }

 
?>