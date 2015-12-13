<?php
    //Page setup
    $title = 'TestForm';
    $active_menu = 'Login';
    require 'header.php';

?>

<!--Content-->  
    
    <div class="container">

        <div class="row">
<form class="horizontal" role="form" method="post" action="testForm.php">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Title:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="title" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="desc">Description:</label>
                <div class="col-sm-9"> 
                  <textarea rows="5" class="form-control" name="desc"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="learning_outcomes">Learning Outcomes:</label>
                <div class="col-sm-9">
                    <div id="textInputContainer"></div>
                    <div class="row">
                        <button id="addOutcome">Add Outcome</button>
                    </div>
                </div>

              </div>
      
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" name="submit" value="Save" class="btn btn-success pull-right">
                </div>
              </div>
            </form>
        </div>
        <div id="output"/>

</div>
<?php
            require('footer.php');
?>