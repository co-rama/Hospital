<?php include_once("includes/database.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php
if(!$session->is_logged_in()){
      redirect_to("index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewpoint" content="width=device-width, initial-scale=1">
<link href="stylesheets/bootstrap.min.css" rel="stylesheet">
<link href="stylesheets/public.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>HOSPITAL</title>
</head>
<body>
<div class="panel panel-primary">
    <div class="panel-heading text-center">
       <h3>ST BERNADS' CHARITABLE HOSPITAL </h3>
    </div>
</div>
<div id="mainfooter">
    <div id="structurefooter">
        <h3 class="text-center">LOG FILE</h3>
        
        <button type="button" class="btn btn-primary"><a href="admin.php" style="color: white">BACK TO ADMIN PANEL</a></button>
        <hr>


  </div>
    </div>
       <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <h4>Copyright @<?php echo date("Y", time())?> St Bernads Charitable Hospital.</h4>
      </div>
  </div>
</body>
</html>