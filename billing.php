<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>
<?php include_once("includes/fpdf.php"); ?>

<?php
  if(!$session->is_logged_in() &&  !$session->position == "Billing"){
      redirect_to("index.php");
      }
      ?>
<?php
   if(isset($_GET['keywords'])){
      $search = ($_GET['keywords']);
       }
       global $search;
     $search_patient = search_patient($search);

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
      
     }
     
  ?>

<td>
<h3 class="text-center">BILLING DETAILS</h3>
             <hr>    
         <form class="search" action="billing.php" method="get" role="form" style="margin:auto; max-width:300px" >
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
                <th>BILL</th>
            </tr>
            <?php
            echo  "<tr>";      
            echo "<td>" .$search_patient['file_number'] . "</td>";
            
            echo "<td>" .$search_patient['first_name'] . "</td>";
            
            echo "<td>" .$search_patient['sur_name'] . "</td>";
            
            echo "<td>" .$search_patient['date'] . "</td>";
          
                if($search_patient['id']){
                echo "<td><button class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#billing_form\">
                ASSIGN BILL</button</td>";
                }else{
                  echo "<td></td>";
                }
            echo "</tr>";
            if(isset($search)){
            //
            }else{
              //echo "<td> </td>";
              //echo "<td> </td>";
              //echo "<td> </td>";
              //echo "<td> </td>";
              //echo "<td> </td>";
              
            }
            ?>
          </table>
          <table class="table table-bordered table-hover">
            <tr class="info">
                <th>FILE NUMBER</th>
                <th>FIRST NAME</th>
                <th>SURNAME</th>
                <th>DATE REPORTED</th>
                <th>BILL</th>
            </tr>
          <?php
          $selected_patients = get_all_patients();
          
          while($sel_patients = $database->fetch_array($selected_patients)){
            echo "<tr class=\"success\">";
            echo "<td>" .$sel_patients['file_number'] . "</td>";
            echo "<td>" .$sel_patients['first_name']. "</td>";
            echo "<td>" .$sel_patients['sur_name'] ."</td>";
            echo "<td>" .$sel_patients['date'] ."</td>";
            echo "<td><button class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#billing_form\">
                ASSIGN BILL</button</td>";
            echo "</tr>";
          }
    
          
          ?>
          </table>         
</td>
    <div class="modal fade" id="billing_form" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3 class="modal-title text-center">BILL FORM</h3>
                </div>
                <div class="modal-body">
                    <!--form with nothing-->
                  <form action="billing.php" method="post" class="form-inline" role="form" style="padding: 0em 5em">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
                  </div>
              </div>
            </div>
        </div>
            <script>
              function myFunction(){
                window.print();
            }
            </script>
<?php include_once("includes/footer.php"); ?>