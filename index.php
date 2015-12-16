<?php
    //Page setup
    $title = 'Learner Guide Repository';
    $active_menu = 'Explore';
    require 'header.php';
?>


<!--Content-->  
    
    <div class="container">
        <div clas="row">
            <div class="col-md-10 col-md-offset-1">
            <h3>General Information</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <?php
              $guides = getGuides();
              echo '<div class="row">';
                
              foreach ($guides as $guide) {
                //Get the short title and short descriptions
                if (strlen($guide['title']) > 20){
                    $shortTitle = substr($guide['title'],0,30).'...';
                }else{
                    $shortTitle = $guide['title'];
                }
                if (strlen($guide['desc']) > 240) {
                    $shortDesc = substr($guide['desc'],0,240).'...';
                }else{
                    $shortDesc = $guide['desc'];
                } 
                echo '<div class="col-sm-4">';
                echo '<div class="card">';
                //echo '<img class="card-img-top" data-src="..." alt="Card image cap">';
                echo '<div class="card-title"><a href="guide.php?id='. $guide['_id'] .'" role="button">'. $shortTitle .'</a></div>';
                echo '<div class="card-text">' . $shortDesc . '</div>';
                //echo '<a class="card-link" href="guide.php?id='. $guide['_id'] .'" role="button">View Details</a>';
                echo '</div></div>';  
              }
            ?>
           
            </div>
            </div>
    </div>
    <div class="spacer50"></div>
<?php
            require('footer.php');
?>