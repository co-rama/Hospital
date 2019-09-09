<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>
<?php include_once("includes/sms_credentials.php"); ?>
<?php
    if(!$session->is_logged_in() &&  !$session->position == "Laboratory"){
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
  //file upload errors
    $upload_errors = array(
      UPLOAD_ERR_OK         => "No errors",
      UPLOAD_ERR_INI_SIZE   =>"Larger than upload maximum size",
      UPLOAD_ERR_FORM_SIZE  => "Larger than form upload size",
      UPLOAD_ERR_PARTIAL    => "Partial upload",
      UPLOAD_ERR_NO_FILE    =>"No file",
      UPLOAD_ERR_NO_TMP_DIR => "No temporary directory",
      UPLOAD_ERR_CANT_WRITE => "Cant write to disk",
      UPLOAD_ERR_FORM_SIZE  => "File upload stopped by extension"
    );
  ?>
  <?php

	$messageN = "";
  if(isset($_POST['save'])){
    
    //PROCESS FORM UPLOAD DATA
    /*
     *@matimu nimekulipa scripts zako njoo na nyingine tena
     *@corama scripts
     */
    $tmp_file = $_FILES['upload']['tmp_name'];
    $target_file = basename($_FILES['upload']['name']);
    $upload_dir = "uploads";
    
    if(move_uploaded_file($tmp_file, $upload_dir."/".$target_file)){
      $messageN = "Test result uploaded successfully";
    }else{
      $errors = $_FILES['upload']['error'];
      $messageN = $upload_errors[$errors];
    }
    
    $id = $_POST['id'];
    $upload = $_FILES['upload']['name'];
    $sms = $database->escape_value($_POST['sms']);
    $sql = "INSERT INTO test (
          patient_id, upload, sms
      )VALUES(
        {$id}, '{$upload}', '{$sms}'
      )";  
      $database->query($sql);
      
      //SMS SENDING GATEWAY
      //BONGOLIVE GATEWAY
          
//======================REQUIRED INFORMATION ============================ 
date_default_timezone_set('Africa/Nairobi');
$sendername = "255676272057";
$username = "ramadhan";
$password = "rY0787272058";
$apikey = "cdd81a10-6da5-11e8-935d-06cba1bf0ce7";
$message = $sms;


//MOBILE NUMBER FROM THE DATABASE
$number = $_POST['tel'];
$formattedNumber = +255 . $number;
$mob = "$formattedNumber";


//==========================END OF REQUIRED INFORMATION ====================


//==================OPTIONAL REQUIREMENTS =========================================
$senddate = "";   //leave blank if you want an sms to be sent immediately or eg 31/03/2014 12:54:00 or 2014-03-31 12:54:00
$proxy_ip = ""; //leave blank if your network environment does not support proxy
$proxy_port = ""; //set your network port, leave black if your network environment does not support proxy 
//===================== END OF OPTIONAL REQUIREMENT ===========================


//===============================DO NOT EDIT ANYTHING BELOW ===================

$sendername = urlencode($sendername);
$apiKey = urlencode($apikey);
$destnum = urlencode($mob);
$message = urlencode($message); 
if(!empty($senddate)){
$senddate = strtotime("2014-05-03 13:50:00");
}
$posturl = "http://www.bongolive.co.tz/api/sendSMS.php?sendername=$sendername&username=$username&password=$password&apikey=$apiKey&destnum=$destnum&message=$message&senddate=$senddate"; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $posturl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0);
curl_setopt($ch, CURLOPT_TIMEOUT, 500);
//tim 
if($proxy_ip !=""){
curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
} 
$response = curl_exec($ch);

//===============YOU CAN EDIT BELOW === 
//echo  $response;
      redirect_to("laboratory.php");
}
  ?>
  <?php
  //sms api refernce
?>
  
<td>
<h3 class="text-center">LABORATORY</h3>
             <hr>    
         <form class="search" action="laboratory.php" method="get" role="form" style="margin:auto; max-width:300px">
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
                <th>TEST TO PERFORM</th>
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
            $test = test($search_patient['id']);
            if(!is_null($test)){
              echo "<td>". $test['test'] . "</td>";
            }else{
              echo "<td>No Test From the Doctor</td>";
            }
            echo "</tr>";
            ?>
          </table>
          
          <form class="form-doctor" enctype="multipart/form-data" action="laboratory.php" method="post" role="form" style="">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input type="hidden" name="id" value="<?php
            if(!is_null($search_patient)){
              echo $search_patient['id'];
            }
            ?>">
            <input type="hidden" name="tel" value="<?php
            if(!is_null($search_patient)){
              echo $search_patient['tel'];
            }
            ?>">
            <div class="form-group">
                <div class="col-sm-4">
            <label for="comment">SMS TEST RESULT:</label>
            <textarea class="form-control" rows="4" cols="1" id="sms" name="sms" placeholder="Test SMS"
            value="Majibu ya vipimo yapo tayari, fika hospitalin mara moja"><?php
            //description from the database
            ?></textarea>
             </div>
            </div>
            
             <?php
                global $messageN;
             if(!empty($messageN)){
                      echo "<p>{$messageN}</p>";
                    }
                 ?>
            <div class="form-group">
                <div class="col-sm-4">          
            <label for="comment">TEST UPLOADS:</label>
            <input class="form-control" type="file" id="upload" name="upload" placeholder="Test upload">
             </div>
            </div>
            
            <div class="col-xs-10" style="padding-top: 2em">
            <button type="submit" class="btn btn-default" name="save" style="">UPLOAD & SMS</button>
            </div>
          </form>

</td>     
<?php include_once("includes/footer.php"); ?>
