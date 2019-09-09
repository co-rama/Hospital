<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>
<?php
 if(!$session->is_logged_in() &&  $session->position == "Admin"){
      redirect_to("index.php");
      }
?>
<?php
   if(isset($_GET['keywords'])){
      $search = ($_GET['keywords']);
       }
       global $search;
     $search_patient = search_patient($search);
     
     if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $user->delete_patients($id);
        redirect_to('delete_patient.php');
     }elseif(isset($_POST['update'])){
        $id = $_POST['id'];
        $user->file_number = $_POST['file_number'];
       $user->first_name = $_POST['first_name'];
       $user->second_name = $_POST['second_name'];
       $user->sur_name = $_POST['sur_name'];
       $user->address = $_POST['address'];
       $user->tel = $_POST['tel'];
       $user->age = $_POST['age'];
       $user->gender = $_POST['gender'];
       $user->date = $_POST['date'];
       $user->time = $_POST['time'];
       $user->update_patients($id);
        redirect_to("delete_patient.php");
     }else{
      //redirect_to("delete_patient");
     }
     
  ?>
<td>
<h3 class="text-center">Patient Control</h3>
   <form class="search" action="delete_patient.php" method="get" role="form" style="margin:auto;  max-width:200px">
            <div class="form-group">
            <input type="text" class="form-control" id="search" name="keywords" value="" placeholder="Search Patient...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
   <br>

<form class="form-inline" action="delete_patient.php" method="post" role="form" style="padding: 0em 5em">
         <br>
         <br>
            <input type="hidden" name="id" value="<?php
            if($search){
              echo $search_patient['id'];
            }
            ?>" required="required">
         <div class="form-group col-xs-3">
             <label for="number">FILE NO:</label>  
             <input type="number" class="form-control" id="fnumber" name="file_number" value="<?php
             if($search){
              echo $search_patient['file_number'];
             }
                ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="first">FIRST NAME:</label>  
             <input type="text" class="form-control" id="first" name="first_name" value="<?php
              if($search){
              echo $search_patient['first_name'];
             }
             ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="second">MIDDLE NAME:</label>
             <input type="text" class="form-control" id="second" name="second_name" value="<?php
             if($search){
              echo $search_patient['second_name'];
             }
              ?>" required="required">
         </div>
          <div class="form-group col-xs-3">
             <label for="sur">SURNAME:</label>
             <input type="text" class="form-control" id="sur" name="sur_name" value="<?php
             if($search){
              echo $search_patient['sur_name'];
             }
              ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="adrs">ADDRESS:</label>
             <input type="text" class="form-control" id="adrs" name="address" value="<?php
             if($search){
              echo $search_patient['address'];
             }
              ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="tel">TEL:</label>
             <input type="text" class="form-control" id="tel" name="tel" value="<?php
             if($search){
              echo $search_patient['tel'];
             }
             ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="age">AGE:</label>  
             <input type="number" class="form-control" id="age" name="age" value="<?php
             if($search){
              echo $search_patient['age'];
             }
             ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="date">DATE:</label>
             <input type="date" class="form-control" id="date" name="date" value="<?php
             if($search){
              echo $search_patient['date'];
             }
              ?> required="required"">
         </div>
         <div class="form-group col-xs-3"  style="padding: 1em">
             <label for="time">TIME IN:</label>  
             <input type="time" class="form-control" id="time" name="time" value="<?php
             if($search){
              echo $search_patient['time'];
             }
              ?> required="required"">
         </div>
         
         <!--radios-->
         <div class="radio  col-xs-3" style="padding: 1em"> 
             <label><input type="radio" name="gender" value="Male"<?php
             if($search){
             if(strnatcmp($search_patient['gender'], "Male")){
                    echo "checked";
             }
             } ?> required="required">Male</label>
             <label><input type="radio" name="gender" value="Female"<?php
             if($search){
            if(strnatcmp($search_patient['gender'], "Female")){
                    echo "checked";
             }
            }  ?> required="required">Female</label>  
          </div>
         <br>
         <br>
         <div class="col-xs-10" style="padding: 3em">
         <button type="submit" class="btn btn-default" name="delete">DELETE</button>
         <button type="submit" class="btn btn-default" name="update">UPDATE</button>
         <button type="reset" class="btn btn-default" name="reset">CLEARFIELD</button>
         <button type="submit" class="btn btn-default" name="cancel" value=""><a href="admin.php" style="color: white">CANCEL</a></button>
         </div>
        </form>

</td>     
<?php include_once("includes/footer.php"); ?>