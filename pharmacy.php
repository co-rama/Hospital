<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>
<?php
    if(!$session->is_logged_in() && !$session->position == "Pharmacy"){
      redirect_to("index.php");
      }
?>
<?php
   if(isset($_GET['keywords'])){
      $search = ($_GET['keywords']);
       }
       global $search;
     $search_patient = search_patient($search);
     
     if(isset($_GET['drugword'])){
        $drug_search = ($_GET['drugword']);
     }
     global $drug_search;
     $search_drug = search_drug($drug_search);
  ?>

<td>
    <h3 class="text-center">MEDICATION PANEL</h3>
    <hr>
   <form class="search" action="pharmacy.php" method="get" role="form" style="margin:auto;  max-width:200px; float:left">
            <div class="form-group">
            <input type="text" class="form-control" id="search" name="keywords" value="" placeholder="Search Patient...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
   
      <form class="search" action="pharmacy.php" method="get" role="form" style="margin:auto;  max-width:200px; float:right" >
            <div class="form-group">
            <input type="text" class="form-control" id="search" name="drugword" value="" placeholder="Search Drug...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
        <br>
        <br>
          <div class="panel panel-primary">
            <div class="panel-heading">PATIENT DETAILS: </div>
          <div class="panel-body">
            <?php
        if(!is_null($search_patient)){
        echo "<p> PATIENT FILE_NO: " . $search_patient['file_number'] . "</p>";
        echo "<br>";
        echo "<p> PATIENT NAMES: " . $search_patient['first_name'] . " " . $search_patient['sur_name'] . "</p>";
        }
        echo "<div class=\"page-header\">";
        echo "<h5>DOCTOR PRESCRIPTION:</h5>";
        echo "</div>";
        if($search_patient['id']){
              $recommendation_row = recommendation($search_patient['id']);
         if(!is_null($recommendation_row)){
            echo $recommendation_row['recommendation'];  
         }else{
            echo "NO RECOMMENDATION, <i><strong>CONSULT The DOCTOR</strong></i>";
         }
        }else{
            echo "NO RECOMMENDATION, <i><strong>CONSULT The DOCTOR</strong></i>";
         }
        ?>
          </div>
        </div>
        
          <div class="panel panel-primary">
            <div class="panel-heading">DRUG DETAILS:</div>
        <div class="panel-body">
        <?php
        if(!is_null($search_drug)){
        echo "<p> DRUG NAMES: " . $search_drug['drug_name'] . "</p>";
        echo "<br>";
        echo "<p> DRUG QUANTITY: " . $search_drug['quantity']. "</p>";
        }else{
            echo "<p>No drug is available</p>";
        }
        ?>
          </div>
        </div>
</td>     
<?php include_once("includes/footer.php"); ?>