<?php include_once("includes/functions.php"); ?>
<?php include("includes/session.php"); ?>

<?php
    
    switch($session->position){
            case "Reception":
                $session->logout();
               redirect_to('index.php');
               break;
            case "Billing":
                $session->logout();
               redirect_to('index.php');
               break;
            case "Doctor":
                $session->logout();
               redirect_to('index.php');
               break;
            case "Laboratory":
                $session->logout();
               redirect_to('index.php');
               break;
            case "Pharmacy":
                $session->logout();
               redirect_to('index.php');
               break;
            case "Admin":
                $session->logout();
               redirect_to('index.php');
               break;
               default :
               redirect_to('index.php');
    }
?>