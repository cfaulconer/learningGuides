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
                <p>This repository includes a set of Learning Guides to be used in active learning experiences to teach science. Learn more aboout how to design these learning activities by participating in the free Canvas course <a href="https://canvas.instructure.com/courses/984786">here</a>.</p>
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