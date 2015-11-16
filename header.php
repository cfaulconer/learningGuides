<?php
    $baseURL = '/learningGuides';
    session_start();
    //Required php files
    require ('model.php');
    require ('auth.php');
    //require ('error.php');
    
    //Grab page name 
    $page = basename($_SERVER['SCRIPT_FILENAME']);
    $allow = auth($page);
    if (!$allow) {
        header('Location:'.$baseURL.'/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
    <!-- Custom Bio 100 Style -->
    <link rel="stylesheet" href="styles/bio100.css">

</head>
<body>
<!--Global navigation-->
    <nav class="navbar navbar-default navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand pull-left" href="index.php"><?php echo $title; ?></a>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse pull-right" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li <?php if ($active_menu == 'Explore') echo 'class="active"';?>><a href="index.php">Explore Guides</a></li>
                    <li <?php if ($active_menu == 'More') echo 'class="active"';?>><a href="">More</a></li>
                    <li <?php if ($active_menu == 'Contact') echo 'class="active"';?>><a href="">Contact Us</a></li>
                    <li <?php if ($active_menu == 'Login') echo 'class="active"';?>>
                        <?php if (isset($_SESSION['username']))
                                {echo '<a href="logout.php">Logout</a>';}
                            else{echo '<a href="login.php">Login</a>';}?></li>
                </ul>
            </div>
        </div>
    </nav>
