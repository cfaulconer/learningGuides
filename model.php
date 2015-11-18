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
//                         $created_by, 
//                         $created_date, 
//                         $updated_by, 
//                         $updated_date, 
                         $link){

        $db = Database::get();
        $collection = $db->guides;
        
        try {
            $id = new MongoID($mongo_id);
            $doc = $collection->find(array("_id"=>$id));
        }
        catch (Exception $e){
            //This is only thrown in some versions of mongo, but when it is thrown, 
            //it means that this is a new record
            $doc = array();
        }
        
        
       // echo "Count of doc is ".count($doc);
        
        if (count($doc)==0){
            //Set the meta data for new guides
            $new = true;
            $created_by = $_SESSION['username'];
            $created_date = new MongoDate();
            $updated_by = $created_by;
            $updated_date = $created_date;
        }
       
//        try {
//            //$id = new MongoID($mongo_id);
//            $doc = $collection->find(array("_id"=>id));
//            $_SESSION['error_msg'] = print_r($doc);
//
//            if (!empty($doc)){
//                echo "HEY! doc is ".print_r($doc);
//            }else{
//                throw new Exception('New document');
//            }
//        }
//        catch (Exception $e){
//            //Error means this is a new guide, so set the create date, etc. 
//            $new = true;
//            $created_by = $_SESSION['username'];
//            $created_date = new MongoDate();
//            $updated_by = $created_by;
//            $updated_date = $created_date;
//
//        }
        
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
                         'created_by' => 'Christian Faulconer',
                         'created_date' => $created_date,
                         'updated_by' => 'Update McUpdater',
                         'updated_date' => new MongoDate(),
                         'link' => $link);
        
        if ($new){
            $collection->insert($newData);
        }else{
            $collection->update(array("_id" => $id),$newData);
        }
 
        return $newData['_id'];
    }

?>