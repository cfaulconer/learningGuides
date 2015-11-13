<?php
    //Page setup
    $title = 'Login';
    $active_menu = 'Login';
    $access_level = 'guest';
    require 'header.php';

    if (isset($_POST['submit'])){
        $access = login($_POST['username'], $_POST['password']);
    }

?>


<!--Content-->  
    
    <div class="container">

        <div class="row">
           <form class="horizontal" role="form" method="post" action="login.php">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="username">Username:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="password">Password:</label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" name="password">
                    </div>
                  </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="submit" value="Login" class="btn btn-success pull-right">
                    </div>
                  </div>
            </form>
        </div>
    </div>
<?php
            require('footer.php');
?>