<?php

    class Database
    {
        private static $_dbUser = 'cfaulconer';
        private static $_dbPass = 'boguspass99';
        private static $_dbServer = 'ds045679.mongolab.com:45679';
        private static $_dbName = 'fetch';
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
                         $learning_outcomes, 
                         $introduction, 
                         $procedures, 
                         $created_by, 
                         $created_date, 
                         $updated_by, 
                         $updated_date, 
                         $link){

        $db = Database::get();
        $collection = $db->guides;
        
        try {
            $id = new MongoID($mongo_id);
        }
        catch (Exception $e){
            //Error means this is a new guide, so set the create date
            $created_date = new MongoDate();
        }
        
        $newData = array('title' => $title,
                         'desc' => $desc, 
                         'learning_outcomes' => $learning_outcomes,
                         'introduction' => $introduction,
                         'procedures' => $procedures,
                         'created_by' => 'Christian Faulconer',
                         'created_date' => $created_date,
                         'updated_by' => 'Update McUpdater',
                         'updated_date' => new MongoDate(),
                         'link' => $link);
        
        $collection->update(array("_id" => $id),$newData, array("upsert"=>true));
 
        return $collection;
    }

?>