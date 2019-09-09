<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>

<?php


//this switch is stored right here
switch($position){
            case "Reception":
               redirect_to("registration.php");
               break;
            case "Billing":
               redirect_to("billing.php");
               break;
            case "Doctor":
               redirect_to("laboratory.php");
               break;
            case "Laboratory":
               redirect_to("doctor.php");
               break;
            case "Pharmacy":
               redirect_to("pharmacy.php");
               break;
            case "Admin":
               redirect_to("admin.php");
               break;
               default :
               redirect_to('index.php');
}

?>

<?php include_once("includes/footer.php"); ?>