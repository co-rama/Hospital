<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php require_once("includes/header.php"); ?>

<?php
  if(!$session->is_logged_in()){
      redirect_to("index.php");
      }
?>
<?php
  
  if(isset($_POST['submit'])){
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
       $user->save();
       redirect_to("registration.php");
  }
?>
<td>
                <h3 class="text-center">PATIENT DETAILS</h3>
            <hr>
          
          <form class="search" action="update_patients.php" method="get" role="form" style="margin:auto; max-width:300px" >
            <div class="form-group">
            <input type="text" class="form-control" id="search" name="keywords" value="" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
              
               <form class="form-inline" action="registration.php" method="post" role="form" style="padding: 0em 5em">
                <br>
                <br>
                <div class="form-group col-xs-3">
                    <label for="number">FILE NO:</label>  
                    <input type="number" class="form-control" id="fnumber" name="file_number" value="<?php
                    echo $user->file_number; ?>" required="required">
                </div>
                <div class="form-group col-xs-3">
                    <label for="first">FIRST NAME:</label>  
                    <input type="text" class="form-control" id="first" name="first_name" value="<?php
                    echo $user->first_name; ?>" required="required">
                </div>
                <div class="form-group col-xs-3">
                    <label for="second">MIDDLE NAME:</label>
                    <input type="text" class="form-control" id="second" name="second_name" value="<?php
                    echo $user->second_name; ?>" required="required">
                </div>
                 <div class="form-group col-xs-3">
                    <label for="sur">SURNAME:</label>
                    <input type="text" class="form-control" id="sur" name="sur_name" value="<?php
                    echo $user->sur_name; ?>" required="required">
                </div>
                <div class="form-group col-xs-3">
                    <label for="adrs">ADDRESS:</label>
                    <input type="text" class="form-control" id="adrs" name="address" value="<?php
                    echo $user->address; ?>" required="required">
                </div>
                <div class="form-group col-xs-3">
                    <label for="tel">TEL:</label>
                    <input type="text" class="form-control" id="tel" name="tel" value="<?php
                    echo $user->tel; ?>" required="required">
                </div>
                <div class="form-group col-xs-3">
                    <label for="age">AGE:</label>  
                    <input type="number" class="form-control" id="age" name="age" value="<?php
                    echo $user->age; ?>" required="required">
                </div>
                <div class="form-group col-xs-3">
                    <label for="date">DATE:</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php
                    echo $user->date; ?>" required="required">
                </div>
                <div class="form-group col-xs-3"  style="padding: 1em">
                    <label for="time">TIME IN:</label>  
                    <input type="time" class="form-control" id="time" name="time" value="<?php
                    echo $user->time; ?>" required="required">
                </div>
                
                <!--radios-->
                <div class="radio  col-xs-3" style="padding: 1em" required="required"> 
                    <label><input type="radio" name="gender"value="Male">Male</label>
                    <label><input type="radio" name="gender" value="Female">Female</label>  
                 </div>
                <br>
                <br>
                <div class="col-xs-12" style="padding:3em">
                <button type="submit" class="btn btn-default" name="submit">SAVE</button>                
                &nbsp; &nbsp; &nbsp; &nbsp;
                <button type="reset" class="btn btn-default" name="clear">CLEARFIELD</button>                
                </div>
               </form>   
</td>
<?php include_once("includes/footer.php"); ?>