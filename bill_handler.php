<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>


<?php
  if(!$session->is_logged_in() &&  !$session->position == "Billing"){
      redirect_to("index.php");
      }
?>
<?php
if(isset($_POST['save'])){
      $id = $_POST['id'];
      $for = $_POST['for'];
      $amount = $_POST['amount'];
      
      $sql = "INSERT INTO bill (
        patient_id, bill_payment_for, amount 
      )VALUES(
      {$id}, '{$for}', '{$amount}'
      )";
      
      $database->query($sql);
      redirect_to("billing.php");
?>
<td>
    <h3 class="text-center">BILLING DETAILS</h3>
    <hr>
    <form action="bill_handler.php" method="post" class="form-inline" role="form" style="padding: 0em 5em">
            <h4 class="text-center" style="text-transform: uppercase"><strong>PATIENT NAME: <?php if(!empty($search_patient)){
              echo $search_patient['first_name'] . "  " .$search_patient['sur_name'];
            } ?></strong></h4>
            <input type="hidden" name="id" value="<?php
            if(!is_null($search_patient)){
             echo $search_patient['id'];
            }
            ?>">
        <div class="form-group col-xm-4">
            <label>DATE REPORTED:</label>
        <input type="date" class="form-control" value="<?php echo $search_patient['date']; ?>" disabled>
          </div>
            <div class="form-group">
            <label for="sel1">BILL TYPE:</label>
            <br>
            <div class="col-xm-4">
            <select class="form-control" id="sel2" name="for"
             value="<?php
              //echo htmlentities($bill_for); ?>" required="required">
                <option>The Doctor</option>
                <option>Test Laboratory</option>
                <option>Drug</option>     
                </select>
            </div>
              </div>
            <br> <br>
            
            <div class="form-group col-xm-4">
              <label for="amount">AMAOUNTS IN TSHS:</label>  
              <input type="number" class="form-control" id="amount" name="amount" value="">
            </div>
              <br> <br>
            <div class="col-sm-9" style="padding: 3em">
            <button type="submit" class="btn btn-primary" name="save">BILL</button>
            <button type="reset" class="btn btn-primary" name="clear">CLEAR</button>
            <button class="btn btn-primary hidden-print" onclick="myFunction()"><i class="fa fa-print"></i> Print</button>
            </div>
            <br>                    
          </form>  
          <script>
              function myFunction(){
                window.print();
            }     
            </script>                

</td>
<?php include("includes/footer.php"); ?>