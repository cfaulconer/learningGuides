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
                    header('Location:'.$baseURL.'/index.php');

                }else{
                    echo '<button type="submit" class="btn btn-success pull-right" onclick="javascript:document.location=\'edit.php?id='.$guideID.'\'">Edit</button>';
                    echo '<h2>' . $guide['title'] . '</h2>';
                    echo '<h3>Description:</h3>';
                    echo '<p>' . $guide['desc'] . '</p>';
                    echo '<h3>Introduction:</h3>';
                    echo '<p>' . $guide['introduction'] . '</p>';
                    echo '<h3>Learning Outcomes:</h3>';
                    echo '<p>' . $guide['learning_outcomes'] . '</p>';
                    echo '<h3>Time Required:</h3>';
                    echo '<p>' . $guide['time_required'] . '</p>';
                    echo '<h3>Supplies Needed:</h3>';
                    echo '<p>' . $guide['supplies_needed'] . '</p>';
                    echo '<h3>Preparation:</h3>';
                    echo '<p>' . $guide['preparation'] . '</p>';
                    echo '<h3>Procedures:</h3>';
                    echo '<p>' . $guide['procedures'] . '</p>';
                    echo '<h3>Wrap Up:</h3>';
                    echo '<p>' . $guide['wrap_up'] . '</p>';
//                    echo '<h3>Online Resources:</h3>';
//                    $links = $guide['content_links'];
//                    foreach ($links as $link){
//                        echo $link;
//                    }
                    echo '<button type="submit" class="btn btn-success pull-right" onclick="javascript:document.location=\'edit.php?id='.$guideID.'\'">Edit</button>';
                }
            ?>
            </div>
            </div>
        </div>
<?php
            require('footer.php');
?>