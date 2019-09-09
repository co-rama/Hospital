<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>
<?php   
      if(!$session->is_logged_in() &&  !$session->position == "Doctor"){
      redirect_to("index.php");
      }
?>
<?php
   if(isset($_GET['keywords'])){
      $search = ($_GET['keywords']);
       }
       global $search;
     $search_patient = search_patient($search);
  ?>
  <?php
  //test handling
  if(isset($_POST['save'])){
    $id = $database->escape_value($_POST['id']);
    $test = $database->escape_value($_POST['test']);
    $sql = "INSERT INTO description (
          patient_id, test
      )VALUES(
        {$id}, '{$test}'
      )";  
      $database->query($sql);
       redirect_to("doctor.php");
  }

  //recommendation handling
if(isset($_POST['rec'])){
  $id = $database->escape_value($_POST['id']);
  $recommend = $database->escape_value($_POST['recommend']);
  
  $sql = "INSERT INTO recommendation (
          patient_id, recommendation
      )VALUES(
        {$id}, '{$recommend}'
      )";  
      $database->query($sql);
        redirect_to("doctor.php");
}
  ?>
<td>
<h3 class="text-center">DOCTOR PANEL</h3>
             <hr>    
         <form class="search" action="doctor.php" method="get" role="form" style="margin:auto; max-width:300px">
            <div class="form-group">
            <input type="text" class="form-control" id="search" name="keywords" value="" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
          <table class="table table-bordered table-hover">
            <tr class="info">
                <th>FILE NUMBER</th>
                <th>FIRST NAME</th>
                <th>SURNAME</th>
                <th>DATE REPORTED</th>
                <th>TEST IMAGE RESULT</th>
            </tr>
            <?php
            echo "<tr>";
            if(!is_null($search_patient)){
            echo "<td>" . $search_patient['file_number'] ."</td>" ;
            }
            if(!is_null($search_patient)){
            echo "<td>" . $search_patient['first_name'] ."</td>" ;
            }
            if(!is_null($search_patient)){
            echo "<td>" . $search_patient['sur_name'] ."</td>" ;
            }
            if(!is_null($search_patient)){
            echo "<td>" . $search_patient['date'] ."</td>" ;
            }
            echo "<td><button class=\"btn btn-primary\"><a href=\"viewtest.php?patient=" . urlencode($search_patient['id']). "\" style=\"color: white\">VIEW TEST</a></button></td>";
            echo "</tr>";
            
            ?>
          </table>
          <div style="float:left; width:1000px;">
      <form class="form-doctor" action="doctor.php" method="post" role="form">
            <input type="hidden" name="id" value="<?php
            if(!is_null($search_patient)){
              echo $search_patient['id'];
            }
            ?>">
            <div class="form-group">
                <div class="col-sm-4">
            <label for="comment">PATIENT TEST DESCRIPTION:</label>
            <textarea class="form-control" rows="4" cols="1" id="test" name="test" placeholder="Test Description"
            required="required"><?php
            //description from the database
            ?></textarea>
             </div>
            </div>
            
            <div class="col-ms-10" style="padding-top: 8em">
            <button type="submit" class="btn btn-default" name="save" style="">SAVE</button>
            </div>
      </form>
          </div>
            <!--    recommendation form-->
            <div style="float: left; width: 1000px">
     <form class="form-doctor" action="doctor.php" method="post" role="form">
            <input type="hidden" name="id" value="<?php
            if(!is_null($search_patient)){
              echo $search_patient['id'];
            }
            ?>">
            <div class="form-group">
                <div class="col-sm-4">
            <label for="comment">PATIENT RECOMMENDATION:</label>
            <textarea class="form-control" rows="4" cols="1" id="recomend" name="recommend" placeholder="Recommendation"
            required="required"><?php
            //recommendation from the database
            ?></textarea>
             </div>
            </div>
            <div class="col-ms-10" style="padding-top: 7em">
            <button type="submit" class="btn btn-default" name="rec" style="">RECOMMEND</button>
            </div>
      </form>
            </div>
</td>     
<?php include_once("includes/footer.php"); ?>