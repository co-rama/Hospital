<?php include_once("includes/database.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>
<?php include_once("includes/header.php"); ?>
<?php
 if(!$session->is_logged_in() &&  $session->position == "Admin"){
      redirect_to("index.php");
      }
    
     if(isset($_GET['drugword'])){
        $drug_search = ($_GET['drugword']);
     }
     global $drug_search;
     $search_drug = search_drug($drug_search);
     
     //HANDLE DRUG FORM DETAILS
     if(isset($_POST['save'])){
        $drug_name = $_POST['drug'];
        $generic = $_POST['generic'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        
        $sql = "INSERT INTO pharmacy (
            drug_name, generic, type, quantity
        ) VALUES (
        '{$drug_name}', '{$generic}', '{$type}', {$quantity}
        )";
        $database->query($sql);
        redirect_to("drug_form.php");
     }
     if(isset($_POST['update'])){
        $drug_name = $_POST['drug'];
        $generic = $_POST['generic'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        $id = $_POST['id'];
        
        $sql = "UPDATE pharmacy SET
        drug_name = '{$drug_name}', generic = '{$generic}', type = '{$type}', quantity = {$quantity}
        WHERE id = {$id} ";
        $database->query($sql);
        
        //return ($database->affected_rows() == 1)? true: false;
        redirect_to("drug_form.php");
     }
     
      if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM pharmacy
        WHERE id = {$id} LIMIT 1";
        $database->query($sql);
        redirect_to("drug_form.php");
      }
?>
<td>
<h3 class="text-center">Drug Control</h3>
    <form class="search" action="drug_form.php" method="get" role="form" style="margin:auto;  max-width:300px" >
            <div class="form-group">
            <input type="text" class="form-control" id="search" name="drugword" value="" placeholder="Search Drug...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
    <form class="form-inline" action="drug_form.php" method="post" role="form" style="padding: 0em 5em">
         <br>
         <br>
            <input type="hidden" name="id" value="<?php
            if($drug_search){
              echo $search_drug['id'];
            }
            ?>">
            <div class="form-group col-xs-3">
             <label for="text">DRUG NAME:</label>  
             <input type="text" class="form-control" name="drug" value="<?php
             if($drug_search){
              echo $search_drug['drug_name'];
             }
                ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="gen">GENERIC:</label>  
             <input type="text" class="form-control" name="generic" value="<?php
              if($drug_search){
              echo $search_drug['generic'];
             }
             ?>" required="required">
         </div>
         <div class="form-group col-xs-3">
             <label for="type">DRUG TYPE:</label>
             <input type="text" class="form-control" name="type" value="<?php
             if($drug_search){
              echo $search_drug['type'];
             }
              ?>" required="required">
         </div>
          <div class="form-group col-xs-3">
             <label for="number">QUANTITY:</label>
             <input type="number" class="form-control" name="quantity" value="<?php
             if($drug_search){
              echo $search_drug['quantity'];
             }
              ?>" required="required">
         </div>
        <br>
        <br>
         <div class="col-xs-10" style="padding: 3em">
         <button type="submit" class="btn btn-default" name="save">Add Drug</button>
         <button type="submit" class="btn btn-default" name="delete">Delete</button>
         <button type="submit" class="btn btn-default" name="update">Update</button>
         <button type="reset" class="btn btn-default" name="reset">Clear Fields</button>
         <button type="submit" class="btn btn-default" name="cancel" value=""><a href="admin.php" style="color: white">Cancel</a></button>
         </div>
    </form>

</td>     
<?php include_once("includes/footer.php"); ?>