<?php
    $baseURL = '/learningGuides';
    session_start();
    ob_start();
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
                    <?php if (isset($_SESSION['username'])){
                                  if ($_SESSION['username']== 'super'){
                                    echo '<li';
                                      if($active_menu == 'Admin') echo ' class="active"';
                                    echo'><a href="admin.php">Admin</a></li>';
                                   }
                            }
                    ?>
                    <li <?php if ($active_menu == 'Explore') echo 'class="active"';?>><a href="index.php">Explore Guides</a></li>
                    <li <?php if ($active_menu == 'Edit') echo 'class="active"';?>><a href="edit.php">Create a Guide</a></li>
                    <li <?php if ($active_menu == 'Contact') echo 'class="active"';?>><a href="contact.php">Contact Us</a></li>
                    <li <?php if ($active_menu == 'Login') echo 'class="active"';?>>
                        <?php if (isset($_SESSION['username']))
                                {echo '<a href="logout.php">Logout '.$_SESSION['username'].'</a>';}
                            else{echo '<a href="login.php">Login</a>';}?></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
        if (isset($_SESSION['error_msg'])){
            echo '<div class="alert alert-warning">';
            echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
            echo '<strong>Warning!</strong> '.$_SESSION['error_msg'];
            echo '</div>';
            unset($_SESSION['error_msg']);
        }
    ?>
