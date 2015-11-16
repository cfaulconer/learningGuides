<?php
    //Page setup
    $title = 'Learner Guide Repository';
    $active_menu = 'Explore';
    require 'header.php';
?>


<!--Content-->  
    
    <div class="container">
        <div class="row">
            <div class="jumbotron">Bacon ipsum dolor amet tenderloin porchetta alcatra pancetta fatback landjaeger cupim doner picanha shoulder meatball kevin. Swine bresaola venison, fatback strip steak pork belly pork chop. Pork belly bacon tenderloin, ball tip strip steak turducken picanha boudin. Ground round tenderloin corned beef doner shankle chuck shank hamburger biltong meatball. Frankfurter swine pork chop hamburger pork belly.</div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="row">
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle btn-std-width" type="button" id="menu1" data-toggle="dropdown">Learning Objectives
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Objective 1</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Objective 2</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Objective 3</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Objective 4</a></li>
                        </ul>
                      </div>
                </div>
                <div class="spacer25"></div>
                <div class="row">
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle btn-std-width" type="button" id="menu1" data-toggle="dropdown">Search Term 2
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 1</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 2</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 3</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 4</a></li>
                        </ul>
                      </div>
                </div>
                <div class="spacer25"></div>
                <div class="row">
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle btn-std-width" type="button" id="menu1" data-toggle="dropdown">Search Term 3
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 1</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 2</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 3</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Term 4</a></li>
                        </ul>
                      </div>
                </div>

            </div>
            <div class="col-sm-9">
            <?php
              //Currently I have a rowbreak after every three guides, but ideally we would just show an image with 
              //a set height so that no rows were necessary. Remove the counter and rowbreak along with the marked
              //sections below when we move to clickable images
              
              //Remove these 4 lines when switched to imaged with fixed height. 
              $count = 0;
              $rowbreak = 3;
              $guides = getGuides();
              echo '<div class="row">';
                
              foreach ($guides as $guide) {
                $count = $count+1;
                echo('<div class="col-xs-6 col-lg-4">');
                echo('<h2>' . $guide['title'] . '</h2>');
                echo('<p>' . $guide['desc'] . '</p>');
                echo('<a class="btn btn-default" href="guide.php?id='. $guide['_id'] .'" role="button">View details &raquo;</a>');
                echo('</div><!--/.col-xs-6.col-lg-4-->');
                
                //remove this if when switched to images with fixed height
                if(($count % $rowbreak) == 0){
                    echo '</div><div class="row">';
                }
              }
            //remove this when switched to images with fixed height    
            echo '</div>';
            ?>
           
            </div>
            </div>
    </div>
<?php
            require('footer.php');
?>