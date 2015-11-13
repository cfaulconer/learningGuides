<?php
    //Page setup
    if (isset($_GET['id'])) {
        $guideID=$_GET['id'];
        $title=$guideID.' Details';
    }else{
        $guideID = '';
        $title='Learner Guide Details';
    }
    $active_menu = 'Explore';
    require 'header.php';
?>


<!--Content-->  
    
    <div class="container">
        <div class="row">
            <div class="jumbotron">Bacon ipsum dolor amet tenderloin porchetta alcatra pancetta fatback landjaeger cupim doner picanha shoulder meatball kevin. Swine bresaola venison, fatback strip steak pork belly pork chop. Pork belly bacon tenderloin, ball tip strip steak turducken picanha boudin. Ground round tenderloin corned beef doner shankle chuck shank hamburger biltong meatball. Frankfurter swine pork chop hamburger pork belly.</div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <?php
              
                $guide = getGuide($guideID);
                if ($guide == ''){
                    //Return to index.php
                }else{
                    echo('<h2>' . $guide['title'] . '</h2>');
                    echo('<p>' . $guide['desc'] . '</p>');
                    echo('<p>' . $guide['learning_outcomes'] . '</p>');
                    echo('<p>' . $guide['introduction'] . '</p>');
                    echo('<p>' . $guide['procedures'] . '</p>');
                    echo '<button type="submit" class="btn btn-success pull-right" onclick="javascript:document.location=\'edit.php?id='.$guideID.'\'">Edit</button>';
                }

            ?>
                  
            </div>
            </div>
        </div>
<?php
            require('footer.php');
?>