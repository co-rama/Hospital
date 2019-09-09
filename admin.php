<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>
<?php
  if(!$session->is_logged_in()){
      redirect_to("index.php");
      }
?>
<td>
<h3 class="text-center">Welcome Admin</h3>
<h4>Select Operation to Perform</h4>
<button type="button" class="btn btn-primary" style="width: 150px"><a href="drug_form.php" style="color: white">Medical control</a></button>
<br>
<button type="button" class="btn btn-primary" style="width: 150px"><a href="delete_patient.php" style="color: white">Deal with Patient</a></button>
<br>
<button type="button" class="btn btn-primary" style="width: 150px"><a href="logfile.php" style="color: white">Log file view</a></button>
<br>
<button type="button" class="btn btn-primary" style="width: 150px"><a href="users_hospital.php" style="color: white">Manage Users</a></button>
</td>     
<?php include_once("includes/footer.php"); ?>