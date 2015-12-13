<?php
    //Page setup
    $title = 'Login';
    $active_menu = 'Login';

    require 'header.php';

    if (isset($_POST['submit'])){
        $access = login($_POST['username'], $_POST['password']);
        if ($access != 'guest'){
            if (isset($_SESSION['attempted_page'])){
                header('Location:'.$_SESSION['attempted_page']);
            }else{
                header('Location:'.$baseURL.'/index.php');
            }
            
        }
//        if ($access != 'guest'){
//           // header('Location:'.$baseURL.'/index.php');
//        }
    }

?>


<!--Content-->  
    <div class="hidden" id="errorMessageText">
        <?php if(isset($_SESSION['error_msg'])){echo $_SESSION['error_msg'];}?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 align="center">Welcome to the Learner Guide Repository</h3>
            </div>
            <div class="spacer15"></div>
        </div>
        <div class="row" >
            <div class="col-md-6 col-md-offset-3">
                <form class="horizontal" role="form" method="post" action="login.php">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                    <div class="spacer15"></div>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="spacer15"></div>
                    <input type="submit" name="submit" value="Login" class="button-large button-blue">
                </form>
            </div>
        </div>
    </div>
<?php
            require('footer.php');
?>