<?php
    //Page setup
    if (isset($_GET['id'])) {
        $guideID=$_GET['id'];
        $title='Edit '.$guideID.' Details';
    }else{
        $guideID = '';
        $title='Create Learner Guide';
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
            
            ?>
                
            <form class="horizontal" role="form" method="post" action="save.php">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Title:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="title" value="<?php echo $guide['title'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Description:</label>
                <div class="col-sm-9"> 
                  <input type="text" class="form-control" id="desc" value="<?php echo $guide['desc'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Learning Objectives:</label>
                <div class="col-sm-9"> 
                  <input type="text" class="form-control" id="learning_objective" value="<?php echo $guide['learning_objective'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Introduction:</label>
                <div class="col-sm-9"> 
                  <input type="text" class="form-control" id="introduction" value="<?php echo $guide['introduction'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Procedures:</label>
                <div class="col-sm-9"> 
                  <input type="text" class="form-control" id="procedures" value="<?php echo $guide['procedures'];?>">
                </div>
              </div>
                <input type="hidden" name="link" value="<?php echo $guideID;?>">
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success pull-right">Save</button>
                </div>
              </div>
            </form>
            </div>
            </div>
        </div>
<?php
            require('footer.php');
?>