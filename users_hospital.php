<?php include_once("includes/database.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/session.php"); ?>

<?php include_once("includes/header.php"); ?>
<?php
  if(!$session->is_logged_in() &&  $session->position == "Admin"){
      redirect_to("index.php");
      }
    
    //SEARCH FOR THE USER
     if(isset($_GET['keywords'])){
      $search = ($_GET['keywords']);
       }
       global $search;
     $search_user = search_user($search);
     
     //PROCESS THE USER FORM 
     
    if(isset($_POST['save'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $position = $_POST['position'];
        
        $sql = "INSERT INTO users (
            username, password, position
        ) VALUES (
        '{$username}', '{$password}', '{$position}'
        )";
        $database->query($sql);
        redirect_to("users_hospital.php");
     }
     if(isset($_POST['update'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $position = $_POST['position'];
        $id = $_POST['id'];
        
        $sql = "UPDATE users SET
        username = '{$username}', password = '{$password}', position = '{$position}'
        WHERE id = {$id} ";
        $database->query($sql);
        
        //return ($database->affected_rows() == 1)? true: false;
        redirect_to("users_hospital.php");
     }
     
      if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM users
        WHERE id = {$id} LIMIT 1";
        $database->query($sql);
        redirect_to("users_hospital.php");
      }
?>
<td>
        <!--form to perform search    -->
        <form class="search" action="users_hospital.php" method="get" role="form" style="margin:auto; max-width:300px" >
            <div class="form-group">
            <input type="text" class="form-control" id="search" name="keywords" value="" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
            </div>
          </form>
    
    <form class="form-inline" action="users_hospital.php" method="post" role="form" style="padding: 4em 8em">
    <input type="hidden" name="id" value="<?php
            if($search){
              echo $search_user['id'];
            }
            ?>">
        <div class="form-group col-xs-4">
            <label for="usr">Username:</label>
            <input type="text" class="form-control" id="username" name="username"
            value="<?php
            if($search){
              echo $search_user['username'];
             } ?>" required="required">
        </div>
        
        <div class="form-group col-xs-4">
            <label for="pwd">Password:</label>
            <input type="text" class="form-control" id="pwd" name="password"
             value="<?php
            if($search){
              echo $search_user['password'];
             }; ?>" required="required">
        </div>
        
          <div class="form-group col-xs-4">
            <label for="sel1">Select Position:</label>
            <br>
            <div class="col-xs-3">
               <select class="form-control" id="sel1" name="position"
                value="<?php
            if($search){
                echo $search_user['position'];
             }; ?>" required="required">
                   <option>Reception</option>
                   <option>Billing</option>
                   <option>Doctor</option>
                   <option>Laboratory</option>
                   <option>Pharmacy</option>
                   <option>Admin</option>     
                   </select>
               </div>
                 </div>
        <br>
        <br>
         <div class="col-xs-10" style="padding: 3em">
         <button type="submit" class="btn btn-default" name="save">REGISTER USER</button>
         <button type="submit" class="btn btn-default" name="delete">DELETE</button>
         <button type="submit" class="btn btn-default" name="update">UPDATE</button>
         <button type="reset" class="btn btn-default" name="reset">CLEARFIELD</button>
         <button class="btn btn-default" name="cancel" value=""><a href="admin.php" style="color: white">CANCEL</a></button>
         </div>
    </form>
</td>     
<?php include_once("includes/footer.php"); ?>