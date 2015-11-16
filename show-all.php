<?php
    $title = 'Show All Data';
    $active_menu = 'Admin';
    require 'header.php';

    $guides = array();

//    $uri = "mongodb://cfaulconer:boguspass99@ds045679.mongolab.com:45679/fetch";
//    $options = array("connectTimeoutMS" => 30000);
//
//    $client = new MongoClient($uri, $options );
//    $db = $client->selectDB("fetch");

    $uri = "mongodb://lgweb:!Dcs^M!Q77WN^hX9@localhost/lg";
    $options = array("connectTimeoutMS" => 30000);

    $client = new MongoClient($uri, $options );
    $db = $client->selectDB("lg");
    $collection = $db->guides;

    $guides = $collection->find()->sort(array('i' => 1));
    foreach ($guides as $guide) {
        print_r($guide);
        echo '<hr>';
    }

    $collection = $db->users;

    $users = $collection->find();
    foreach ($users as $user) {
        print_r($user);
        echo '<hr>';
    }


?>