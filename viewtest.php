<?php include_once("includes/database.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php
   if(!$session->is_logged_in() &&  $session->position == "Doctor"){
      redirect_to("index.php");
      }
?>
<?php
    if(isset($_GET['patient'])){
        global $upload_set;
        $id = $_GET['patient'];
        $sql = "SELECT upload FROM test WHERE patient_id = {$id} ORDER BY id DESC";
        $upload_set = $database->query($sql);    
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewpoint" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="stylesheets/public.css" rel="stylesheet" type="text/css" media="all">
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
        <h3 class="text-center">IMAGE VIEW OF THE TEST RESULT</h3>
        
        <button type="button" class="btn btn-primary"><a href="doctor.php" style="color: white">BACK TO DOCTOR PANEL</a></button>
        <hr>
    <tr>
        <td>
        <img src="uploads/<?php
        if($image_name = $database->fetch_array($upload_set)){
        echo $image_name['upload'];
        }
        ?>" class="img-responsive" alt="<?php $image_name['upload']?>">  
        </td>
    </tr>
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