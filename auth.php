<?php

    function login($user, $pass){
        $mongo = new MongoClient();
        $collection = $mongo->my_db->users;
        $user = $collection->findOne(array('username'=>$user, 'password'=>$pass));
            
        if (isset($user['access'])){
            $access = $user['access'];
        }else{
            $access = 'guest';
            $user = 'guest';
        }
        
        $_SESSION['username']=$user['username'];

        //Update the Session ID in the db
        $sid = session_id();
        $newdata = array('$set' => array("session_id" => $sid));
        $result = $collection->update(array("username" => $user['username']),$newdata);
        
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
                       'login.php'=>'guest'
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
                $mongo = new MongoClient();
                $collection = $mongo->my_db->users;
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
        }            
        
        return $allow;
       
    }

 
?>