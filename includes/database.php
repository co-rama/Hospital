<?php
require("constants.php");

class MySQLDatabase{
    private $connection;
    public $last_query;
    
    function __construct(){
        $this->connection;
    }
    public function open_connection(){
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
        if(!$this->connection){
            die("Database connection failed" . mysqli_error($this->connection));
        }else{
            //select database to use
            $db_select = mysqli_select_db($this->connection, DB_NAME);
            if(!$db_select){
                die("Database selection failed" . mysqli_error($this->connection));
            }else{
                //
            }
        }
        return $this->connection;
    }
    public function close_connection(){
        if(isset($this->connection)){
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }
    public function query($sql){
        $this->last_query = $sql;
        $result = $this->open_connection()->query($sql);
        $this->confirm_query($result);
        return $result;
    }
    public function fetch_array($result_set){
        return mysqli_fetch_array($result_set);
    }
    public function num_rows($result_set){
        return mysqli_num_rows($result_set);
    }
    public function insert_id(){
        return mysqli_insert_id($this->connection);
    }
    public function affected_rows(){
        return mysqli_affected_rows($this->connection);
    }
    public function escape_value($value){ 
           $magic_quotes_active = get_magic_quotes_gpc();
           $new_enough_php = function_exists("$magic_quotes_active");
           
           if($new_enough_php){
               //undo any magic quote effects so that mysql escpe can do the work
               if($magic_quotes_active){
                   $value = stripslashes("$value");
                   $value = mysqli_real_escape_string($value);
               }else{
                   if(!$magic_quotes_active){
                       //if the magic quaotes aint ready turned on then turn them manually
                       $value = addslashes($value);
                       
                   }
               }
           }
           return $value;
       }
    private function confirm_query($result){
        if(!$result){
            $output = "database query failed: " . mysqli_error($this->connection) . "<br><br>";
            $output .= $this->last_query;
            die($output);
        }
    }
}
$database = new MySQLDatabase();
?>