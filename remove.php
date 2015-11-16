<?php
    $title = 'Remove Guides';
    $active_menu = 'Admin';
    require 'header.php';

    $uri = "mongodb://lgweb:!Dcs^M!Q77WN^hX9@localhost/lg";
    $options = array("connectTimeoutMS" => 30000);

    $client = new MongoClient($uri, $options );
    $db = $client->selectDB("lg");
    $collection = $db->guides;
    $collection->remove();
    
    echo 'All guides removed';

?>