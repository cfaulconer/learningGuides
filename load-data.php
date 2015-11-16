<?php
    //How many do you want to load? 
    $loadCount = 10;

    $guides = array();
    for ($i = 0; $i<$loadCount; $i++) {
      $guides[] = array('title' => 'Guide '.$i, 
                        'desc' => 'This is the description for guide '.$i.' and it is really awesome.', //2 lines
                        'learning_outcomes' => 'Sample learning outcomes.', //4 lines
                        'time_required' => 'It will take a little bit of time to do this.', //multiple
                        'supplies_needed' => 'Supplies needed.', //long
                        'preparation' => 'What you have to do before class',
                        'introduction' => 'Sample introduction. In class.',
                        'procedures' => 'Sample procedures. In class.', //long - 20 lines
                        'wrap_up' => 'Sample wrap up. In class.',
//                        'content_links' =>array(
//                            '<iframe width="640" height="360" src="https://www.youtube.com/embed/v59uc-Vp4Kg" frameborder="0" allowfullscreen></iframe>', 
//                            '<iframe width="640" height="360" src="https://www.youtube.com/embed/K-tHpwMjkrA" frameborder="0" allowfullscreen></iframe>'
//                            ),
                        'created_by' => 'Christian Faulconer',
                        'created_date' => new MongoDate(),
                        'updated_by' => 'Update McUpdater',
                        'updated_date' => new MongoDate(),
                        'link' => 'guide'.$i);
    }

    //$uri = "mongodb://cfaulconer:boguspass99@ds045679.mongolab.com:45679/fetch";
    $uri = "mongodb://lgweb:!Dcs^M!Q77WN^hX9@localhost/lg";
    $options = array("connectTimeoutMS" => 30000);

    $client = new MongoClient($uri, $options );
    $db = $client->selectDB("lg");
    $collection = $db->guides;
    $collection->drop();

    $collection->batchInsert($guides);

    $guides = $collection->find()->sort(array('i' => 1));

    echo "<h1>Guide Data</h1>";
    foreach ($guides as $guide) {
        print_r($guide);
        echo '<hr>';
    }

    $users[] = array('username' => 'cfaulconer',
                     'password' => 'boguspass',
                     'access' => 'user',
                     'created_date' => new MongoDate(),
                     'updated_date' => new MongoDate());
    $adminUsers[] = array('username' => 'admin',
                     'password' => 'admin',
                     'access' => 'admin',
                     'created_date' => new MongoDate(),
                     'updated_date' => new MongoDate());

    $collection = $db->users;
    $collection->drop();

    $collection->batchInsert($users);
    $collection->batchInsert($adminUsers);

    $users = $collection->find();

    echo "<h1>User Data</h1>";
    foreach ($users as $user) {
        print_r($user);
        echo '<hr>';
    }


?>