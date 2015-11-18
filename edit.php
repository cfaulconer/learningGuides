<?php
    //Page setup
    if (isset($_GET['id'])) {
        $guideID=$_GET['id'];
        $title='Edit '.$guideID.' Details';
    }else if (isset($_POST['id'])){
        $guideID = $_POST['id'];
        $title='Edit '.$guideID.' Details';

    }else{
        $guideID = 'new';
        $title='Create Learner Guide';
    }
    $active_menu = 'Edit';
    
    require 'header.php';
   // require 'error.php';


?>


<!--Content-->  
    
    <div class="container">
        <div class="row">
            <div class="jumbotron">Bacon ipsum dolor amet tenderloin porchetta alcatra pancetta fatback landjaeger cupim doner picanha shoulder meatball kevin. Swine bresaola venison, fatback strip steak pork belly pork chop. Pork belly bacon tenderloin, ball tip strip steak turducken picanha boudin. Ground round tenderloin corned beef doner shankle chuck shank hamburger biltong meatball. Frankfurter swine pork chop hamburger pork belly.</div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <?php
                //process the update
                    if (isset($_POST['submit'])){
                        $guideID = updateGuide($_POST['id'],
                                                    $_POST['title'], 
                                                    $_POST['desc'],
                                                    $_POST['introduction'],
                                                    $_POST['learning_outcomes'],
                                                    $_POST['time_required'],
                                                    $_POST['supplies_needed'],
                                                    $_POST['preparation'],
                                                    $_POST['procedures'],
                                                    $_POST['wrap_up'],
                                                 //   $_POST['content_links'],
                //                                    $_POST['created_by'],
                //                                    $_POST['created_date'],
                //                                    $_POST['updated_by'],
                //                                    $_POST['updated_date'],
                                                    $_POST['link']);
                        //After update, redirect to the guide view
                        //header('Location:'.$baseURL.'/guide.php?id='.$guideID);
                        //print_r($guideID);

                    }else{
                        $guide = getGuide($guideID);
                    }
            
            ?>
                
            <form class="horizontal" role="form" method="post" action="edit.php">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Title:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="title" value="<?php echo ($guideID != 'new' ?$guide['title'] : '');?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="desc">Description:</label>
                <div class="col-sm-9"> 
                  <textarea rows="5" class="form-control" name="desc"><?php echo ($guideID != 'new' ?$guide['desc'] : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="introduction">Introduction:</label>
                <div class="col-sm-9"> 
                  <textarea rows="5" class="form-control" name="introduction"><?php echo ($guideID != 'new' ?$guide['introduction'] : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="learning_outcomes">Learning Outcomes:</label>
                <div class="col-sm-9"> 
                <textarea rows="5" class="form-control" name="learning_outcomes"><?php echo ($guideID != 'new' ?$guide['learning_outcomes'] : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="time_required">Time Required:</label>
                <div class="col-sm-9"> 
                <input type="text" class="form-control" name="time_required" value="<?php echo ($guideID != 'new' ? $guide['time_required'] : '' );?>">
                </div>
              </div>
              <!--Supplies Needed-->
              <div class="form-group">
                <label class="control-label col-sm-3" for="supplies_needed">Supplies Needed:</label>
                <div class="col-sm-9"> 
                  <textarea rows="5" class="form-control" name="supplies_needed"><?php echo ($guideID != 'new' ?$guide['supplies_needed'] : '');?></textarea>
                </div>
              </div>
              <!--Supplies Needed-->
<div class="form-group">
                <label class="control-label col-sm-3" for="preparation">Preparation:</label>
                <div class="col-sm-9"> 
                  <textarea rows="5" class="form-control" name="preparation"><?php echo ($guideID != 'new' ?$guide['preparation'] : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="procedures">Procedures:</label>
                <div class="col-sm-9"> 
                  <textarea rows="5" class="form-control" name="procedures"><?php echo ($guideID != 'new' ?$guide['procedures'] : '');?></textarea>
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="wrap_up">Wrap Up:</label>
                <div class="col-sm-9"> 
                  <textarea rows="5" class="form-control" name="wrap_up"><?php echo ($guideID != 'new' ?$guide['wrap_up'] : '');?></textarea>
                </div>
              </div>
      <!--          
                <input type="hidden" name="created_by" value="<?php echo $guide['created_by'];?>">
                <input type="hidden" name="created_date" value="<?php echo $guide['created_date'];?>">
                <input type="hidden" name="updated_by" value="<?php echo $guide['updated_by'];?>">
                <input type="hidden" name="updated_date" value="<?php echo $guide['updated_date'];?>">
    -->
                <input type="hidden" name="link" value="<?php echo $guideID;?>">
                <input type="hidden" name="id" value="<?php if(isset($guide['_id'])) echo $guide['_id'];?>">
      
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" name="submit" value="Save" class="btn btn-success pull-right">
                </div>
              </div>
            </form>
            </div>
            </div>
        </div>
<?php
            require('footer.php');
?>