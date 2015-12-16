<?php
    //Page setup
    if (isset($_GET['id'])) {
        $guideID=$_GET['id'];
        $title='Edit '.$guideID.' Details';
        //Existing guide
        $update = 'update';
    }

//else if (isset($_POST['id'])){
//        $guideID = $_POST['id'];
//        $title='Edit '.$guideID.' Details';
//        //Existing guide
//        $update = 'update';
//    }
    else{
        $guideID = 'new';
        $title='Create Learner Guide';
        //New guide
        $update = 'new';
        
    }
    $active_menu = 'Edit';
    
    require 'header.php';
   // require 'error.php';


?>


<!--Content-->  
    
    <div class="container">
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
                                                    $_POST['created_by'],
                                                    $_POST['created_date'],
                //                                    $_POST['updated_by'],
                //                                    $_POST['updated_date'],
                                                    $_POST['update']);
                        //After update, redirect to the guide view
                        header('Location:'.$baseURL.'/guide.php?id='.$guideID);
                        
                    }else{
                        $guide = getGuide($guideID);
                    }
            
            ?>
                
            <form class="horizontal" role="form" method="post" action="edit.php">
              <div class="form-group"> 
                <div class="col-sm-12">
                  <input type="submit" name="submit" value="Save" class="button-big button-blue pull-right">
                </div>
              </div>
                <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label" for="title">Title:</label>
                  <input type="text" class="form-control" name="title" value="<?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['title']) : '');?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12"> 
                  <label class="control-label" for="desc">Description:</label>
                  <textarea rows="5" class="form-control" name="desc"><?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['desc']) : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">           
                  <label class="control-labeL" for="introduction">Introduction:</label>
                  <textarea rows="5" class="form-control" name="introduction"><?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['introduction']) : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12"> 
                <label class="control-label" for="learning_outcomes">Learning Outcomes:</label>
                <textarea rows="5" class="form-control" name="learning_outcomes"><?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['learning_outcomes']) : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12"> 
                <label class="control-label" for="time_required">Time Required:</label>
                <input type="text" class="form-control" name="time_required" value="<?php echo ($guideID != 'new' ? str_replace('<br />',"\n",$guide['time_required']) : '' );?>">
                </div>
              </div>
              <!--Supplies Needed-->
              <div class="form-group">
                  <div class="col-sm-12">
                <label class="control-label" for="supplies_needed">Supplies Needed:</label> 
                  <textarea rows="5" class="form-control" name="supplies_needed"><?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['supplies_needed']) : '');?></textarea>
                </div>
              </div>
              <!--Supplies Needed-->
<div class="form-group">
                <div class="col-sm-12">            
                  <label class="control-label" for="preparation">Preparation:</label>
                  <textarea rows="5" class="form-control" name="preparation"><?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['preparation']) : '');?></textarea>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-12">
                <label class="control-label" for="procedures">Procedures:</label> 
                  <textarea rows="5" class="form-control" name="procedures"><?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['procedures']) : '');?></textarea>
                </div>
              </div>
            <div class="form-group">
                <div class="col-sm-12">
                <label class="control-label" for="wrap_up">Wrap Up:</label> 
                  <textarea rows="5" class="form-control" name="wrap_up"><?php echo ($guideID != 'new' ?str_replace('<br />',"\n",$guide['wrap_up']) : '');?></textarea>
                </div>
              </div>
                
                <input type="hidden" name="created_by" value="<?php echo $guide['created_by'];?>">
                <input type="hidden" name="created_date" value="<?php echo $guide['created_date'];?>">
                <input type="hidden" name="updated_by" value="<?php echo $guide['updated_by'];?>">
                <input type="hidden" name="updated_date" value="<?php echo $guide['updated_date'];?>">
    
                <input type="hidden" name="update" value="<?php echo $update;?>">
                <input type="hidden" name="id" value="<?php if(isset($guide['_id'])) echo $guide['_id'];?>">
      
              <div class="form-group"> 
                <div class="col-sm-12">
                  <input type="submit" name="submit" value="Save" class="button-big button-blue pull-right">
                </div>
              </div>
            </form>
            </div>
            </div>
        </div>
<?php
            require('footer.php');
?>