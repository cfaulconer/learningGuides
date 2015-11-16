<?php
$title = 'Admin Links';
$active_menu = 'Admin';
require 'header.php';

echo '
    <h1>Admin Links</h1>
    <a href="load-data.php">Drop and reload the users and guides collections.</a>
    <hr>
    <a href="show-all.php">Show everything in the guides and users collections.</a>
    <hr>
    <a href="remove.php">Remove all guides in the guides collection.</a>
    ';
?>