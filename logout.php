<?php
    //Page setup
    $title = 'Logout';
    $active_menu = 'Login';
    require 'header.php';
    //require 'error.php';

    logout();
    header('Location:'.$baseURL.'/login.php');


?>
