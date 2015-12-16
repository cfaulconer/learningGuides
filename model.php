<?php

    //$DB_LOCATION options: 'local' or 'remote'
    //$DB_LOCATION = 'local';
    class Database
    {
        //$config = include('config.php');
//        private static $_dbUser = 'cfaulconer';
//        private static $_dbPass = 'boguspass99';
//        private static $_dbServer = 'ds045679.mongolab.com:45679';
        
        private static $_dbUser = 'lgweb';
        private static $_dbPass = '!Dcs^M!Q77WN^hX9';
        private static $_dbServer = 'localhost';
        
        private static $_dbName = 'lg';
        private static $_dbOptions = array("connectTimeoutMS" => 30000);
        private static $_db = NULL;
        
        

       /**
        * Constructor
        * prevents new Object creation
        */

       private function __construct(){
       }

        public static function get() {
          if (!self::$_db) {
              $uri = "mongodb://".self::$_dbUser.":".self::$_dbPass."@".self::$_dbServer."/".self::$_dbName;
              
              try {
                $connection = new MongoClient($uri, self::$_dbOptions);
              } catch (MongoConnectionException $e) {
                  die('Error connecting to MongoDB server:<br>'. $e->getMessage());
              } catch (MongoException $e) {           
                  die('Error: ' . $e->getMessage());
              }
              
              self::$_db = $connection->selectDB(self::$_dbName);
          }
          return self::$_db;
       }
    }   

    function cleanInput($post_content){
        $clean_content = str_replace("\r\n","<br />",$post_content);
        return $clean_content;
    }

    function getGuides(){
        $db = Database::get();
        $collection = $db->guides;
        $guides = $collection->find()->sort(array('Title' => 1));
        return $guides;
    }

    function getGuide($mongo_id){
        $db = Database::get();
        $collection = $db->guides;
        try {
            $id = new MongoID($mongo_id);
            $guide = $collection->findOne(array('_id'=>$id));
        } catch (Exception $e){
            //No id = no guide
            $guide = '';
        }
        return $guide;   
    }


    function updateGuide($mongo_id, 
                         $title, 
                         $desc, 
                         $introduction,
                         $learning_outcomes, 
                         $time_required,
                         $supplies_needed,
                         $preparation,
                         $procedures, 
                         $wrap_up,
                        // $content_links,
                         $created_by, 
                         $created_date, 
//                         $updated_by, 
//                         $updated_date, 
                         $update){

        $db = Database::get();
        $collection = $db->guides;
        
        $new = false;
        
        if ($update == 'new'){
            //Set the meta data for new guides
            $new = true;
            $created_by = $_SESSION['username'];
            $created_date = new MongoDate();
            $updated_by = $created_by;
            $updated_date = $created_date;
        }else{
            $updated_by = $_SESSION['username'];
            $id = new MongoID($mongo_id);
        }
       
        //Clean up htmlchars and line breaks
        $title = cleanInput(htmlentities($title, ENT_QUOTES, 'UTF-8'));
        $desc = cleanInput(htmlentities($desc, ENT_QUOTES, 'UTF-8'));
        $introduction = cleanInput(htmlentities($introduction, ENT_QUOTES, 'UTF-8'));
        $learning_outcomes = cleanInput(htmlentities($learning_outcomes, ENT_QUOTES, 'UTF-8'));
        $supplies_needed = cleanInput(htmlentities($supplies_needed, ENT_QUOTES, 'UTF-8'));
        $preparation = cleanInput(htmlentities($preparation, ENT_QUOTES, 'UTF-8'));
        $procedures = cleanInput(htmlentities($procedures, ENT_QUOTES, 'UTF-8'));
        $wrap_up = cleanInput(htmlentities($wrap_up, ENT_QUOTES, 'UTF-8'));
        
        $newData = array('title' => $title,
                         'desc' => $desc, 
                         'introduction' => $introduction,
                         'learning_outcomes' => $learning_outcomes,
                         'time_required' => $time_required,
                         'supplies_needed' => $supplies_needed,
                         'preparation' => $preparation,
                         'procedures' => $procedures,
                         'wrap_up' => $wrap_up,
                         //'content_links' => $content_links,
                         'created_by' => $created_by,
                         'created_date' => $created_date,
                         'updated_by' => $updated_by,
                         'updated_date' => new MongoDate());
        
        if ($new){
            $collection->insert($newData);
            $retval = $newData['_id'];
        }else{
            $collection->update(array("_id" => $id),$newData);
            $retval = $id;
        }
 
        return $id;
    }

?>