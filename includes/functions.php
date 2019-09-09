<?php
    
    function redirect_to($Location = NULL){
        if($Location != NULL){
            header("Location: {$Location}");
            exit;
        }
    }
    function __autoload($class_name){
        $class_name = strtolower($class_name);
        $path = "C:\xampp\htdocs\hospital\includes\{$class_name}.php";
        if(file_exists($path)){
            require_once($path);
        }else{
            die("The file {$path}.php was not found.");
        }
    }
     function search_patient($keyword){
        global $database;
        $sql = "SELECT * FROM patients WHERE file_number LIKE '%{$keyword}%'
        OR first_name LIKE '%{$keyword}%' OR id LIKE '%{$keyword}%'";
        $query = $database->query($sql);
       if($row =  $database->fetch_array($query)){
            return $row;
       }else{
            echo "<h5>PATIENT SEARCHED DOES NOT EXIST</h5>";
       }
    }
    function get_all_patients(){
        global $database;
       $sql = "SELECT * FROM patients ORDER BY time DESC LIMIT 5";
       if($row = $database->query($sql)){
       return $row;
    }else{
        echo "<h5>PATIENT DOES NOT EXIST</h5>";
    }
    }
    function search_drug($drugword) {
        global $database;
        $sql = "SELECT * FROM pharmacy WHERE id LIKE '%{$drugword}%'
        OR drug_name LIKE '%{$drugword}%'";
        $query = $database->query($sql);
        
            if($row = $database->fetch_array($query)){
            return $row;
        }
        else{
            echo "<h5>DRUG IS NOT UPLOADED or DOES NOT EXIST <i>Contact ADMIN</i></h5>";
        }
    }
    function recommendation($patient_id){
        global $database;
        $sql = "SELECT recommendation FROM recommendation
        WHERE patient_id =" . $patient_id . " ORDER BY id DESC";
        
            $query = $database->query($sql);
            
        if($row = $database->fetch_array($query)){
            return $row;
        }else{
            return null;
        }
    }
    function test($patient_id){
        global $database;
        $sql = "SELECT test FROM description
        WHERE patient_id =" . $patient_id . " ORDER BY id DESC";
        $query = $database->query($sql);
        if($row = $database->fetch_array($query)){
            return $row;
        }else{
            return null;
        }
    }
    function delete_patient($patient_id){
        //global $database;
        //$sql = "DELETE FROM patients WHERE id=" . $patient_id . " LIMIT 1";
        //$query = $database->query($sql);
        //if($database->affected_rows() == 1){
        //    //delete success
        //}else{
        //    echo "<h5>Deletion was not successful<h5>";
        //}
    }
    function search_user($keyword){
        global $database;
        $sql = "SELECT * FROM users WHERE username LIKE '%{$keyword}%'
        OR id LIKE '%{$keyword}%'";
        $query = $database->query($sql);
       if($row =  $database->fetch_array($query)){
            return $row;
       }else{
            echo "<h5>USER SEARCHED DOES NOT EXIST</h5>";
       }
    }
    function message($message){
        echo "<h5> {$message} </h5>";
    }
?>
