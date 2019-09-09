<?php include_once("includes/database.php"); ?>
<?php include_once("includes/functions.php"); ?>
<?php include_once("includes/user.php"); ?>
<?php include_once("includes/session.php"); ?>

<?php include_once("includes/header.php"); ?>
<?php
    if($session->is_logged_in()){
        switch($session->position){
          case "Reception":
              redirect_to("registration.php");
              break;
            case "Billing":
              redirect_to("billing.php");
              break;
            case "Doctor":
              redirect_to("doctor.php");
              break;
            case "Laboratory":
              redirect_to("laboratory.php");
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
    }
    if(isset($_POST['submit'])){
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $position = trim($_POST['position']);
            
            //check to see if user exist in the database
       $found_user = User::authenticate($username, $password, $position);
      if($found_user){
          
          switch($found_user->position){
            case "Reception":
                $session->login($found_user);
               redirect_to("registration.php");
               break;
            case "Billing":
                $session->login($found_user);
               redirect_to("billing.php");
               break;
            case "Doctor":
                $session->login($found_user);
               redirect_to("doctor.php");
               break;
            case "Laboratory":
                $session->login($found_user);
               redirect_to("laboratory.php");
               break;
            case "Pharmacy":
                $session->login($found_user);
               redirect_to("pharmacy.php");
               break;
            case "Admin":
                $session->login($found_user);
               redirect_to("admin.php");
               break;
               default :
               redirect_to('index.php');
          }
      }
      else{
            //output this message later on
            $message = "Username and password combination is incorrect";
      }
    }else{
            //no form submitted
       $username = " ";
       $password = " ";
    }
    
?>
            <td>
            <h3></h3>
            <?php
            global $message;
                if($message){
                    message($message);
                }
            ?>
            <form class="form-doctor" action="index.php" method="post" role="form" style="padding: 4em 8em">       
             <div class="form-group">
                 <label for="usr">Username:</label>
                 <input type="text" class="form-control" id="username" name="username" style="width: auto" placeholder="Enter Username"
                 value="<?php
                 echo htmlentities($username); ?>" required="required">
             </div>
             
             <div class="form-group">
                 <label for="pwd">Password:</label>
                 <input type="password" class="form-control" id="pwd" name="password" style="width: auto" placeholder="Enter Password"
                  value="<?php
                 echo htmlentities($password); ?>" required="required">
             </div>
             
               <div class="form-group">
                 <label for="sel1">Select Position:</label>
                 <br>
                 <div class="col-xs-3">
                    <select class="form-control" id="sel1" name="position"
                     value="<?php
                 echo htmlentities($position); ?>" required="required">
                        <option>Reception</option>
                        <option>Billing</option>
                        <option>Doctor</option>
                        <option>Laboratory</option>
                        <option>Pharmacy</option>
                        <option>Admin</option>     
                        </select>
                    </div>
                      </div>
             <br> <br> 
             <div style="padding-left: 20em">
             <button type="submit" class="btn btn-default" name="submit">lOGIN</button>
             </div>
            </form>
            </td>
        
      </tr>
    </tbody>
</table>
  </div>
    </div>
       <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <h4>Copyright @<?php echo date("Y M",time())?> St Bernads Charitable Hospital.</h4>
      </div>
  </div>
</body>
</html>