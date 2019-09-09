<?php
class User{
    protected static $table_name = "patients";
    protected static $table_users = "users";

    public $id;
    public $file_number;
    public $first_name;
    public $second_name;
    public $sur_name;
    public $time;
    public $tel;
    public $date;
    public $age;
    public $address;
    public $gender;
    
    public $username;
    public $password;
    public $position;
    public $last_name;
    
    public static function authenticate($username = "", $password = "", $position = ""){
        global $database;
        $username = $database->escape_value($username);
        $password = $database->escape_value($password);
        //$position = $database->escape_value($position);
        
        $sql = "SELECT * FROM " . self::$table_users . " ";
        $sql .= " WHERE username = '{$username}' ";
        $sql .= " AND password = '{$password}' ";
        $sql .= " AND position = '{$position}' ";
        $sql .= " LIMIT 1";
        $result_array = self::find_by_sql($sql);
        return !empty($result_array)? array_shift($result_array): false;
    }
    public function full_name(){
        if(isset($this->first_name) && isset($this->last_name)){
            return $this->first_name . " " . $this->last_name;
        }else{
            return " ";
        }
    }
    public static function find_all(){
        return self::find_by_sql("SELECT * FROM " . self::$table_name);
    }
    
    public static function find_by_sql($sql=""){
        
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();
        while($row = $database->fetch_array($result_set)){
            $object_array[] = self::instantiate($row);
        }
        return $object_array;
    }
    public static function find_by_id($id){
        global $database;
        $result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE id = {$id} LIMIT 1");
        return !empty($result_array)? array_shift($result_array): false;
    }
    private static function instantiate($record){
        
        $object = new self;
        foreach($record as $attribute=>$value){
            if($object->has_attribute($attribute)){
                $object->$attribute= $value;
            }
        }
        return $object;
    }
    private function has_attribute($attribute){
        //return an array with key and thier respective values
        $object_vars = get_object_vars($this);
        
        //not caring about db values just checking whether the keys exists
        return array_key_exists($attribute, $object_vars);
    }
    public function create_patients(){
        global $database;
        $sql = "INSERT INTO patients (";
        $sql .= "file_number, first_name, second_name, sur_name, time, tel, age, date, address, gender";
        $sql .= ") VALUES ('";
        $sql .= $database->escape_value($this->file_number) . "','";
        $sql .= $database->escape_value($this->first_name) . "','";
        $sql .= $database->escape_value($this->second_name) . "','";
        $sql .= $database->escape_value($this->sur_name) . "','";
        $sql .= $database->escape_value($this->time) . "','";
        $sql .= $database->escape_value($this->tel) . "','";
        $sql .= $database->escape_value($this->age) . "','";
        $sql .= $database->escape_value($this->date) . "','";
        $sql .= $database->escape_value($this->address) . "','";
        $sql .= $database->escape_value($this->gender) . " ')";
        if($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        }else{
            return false;
        }
    }
    public function update_patients($id){
        global $database;
        //escaping values to prevent msqli injection
        $sql = "UPDATE patients SET ";
        $sql .= "file_number='" . $database->escape_value($this->file_number) . "',";
        $sql .= "first_name='" . $database->escape_value($this->first_name) . "',";
        $sql .= "second_name='". $database->escape_value($this->second_name) . "',";
        $sql .= "sur_name='" . $database->escape_value($this->sur_name) . "',";
        $sql .= "time='". $database->escape_value($this->time) . "',";
        $sql .= "tel='". $database->escape_value($this->tel) . "',";
        $sql .= "age='" . $database->escape_value($this->age) . "',";
        $sql .= "date='" . $database->escape_value($this->date) . "',";
        $sql .= "address='" . $database->escape_value($this->address) . "',";
        $sql .= "gender='" . $database->escape_value($this->gender) . "' ";
        $sql .= "WHERE id= " . $database->escape_value($id) . " ";
        $database->query($sql);
        return ($database->affected_rows() == 1)? true : false;
    }
    public function delete_patients($id){
        global $database;
        $id1 = $database->escape_value($id);
        $sql = "DELETE FROM patients ";
        $sql .= " WHERE id= {$id1} LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() == 1)? true: false;
    }
    public function searching($keyword){ 
    }
    public function save(){
        return isset($this->id)? $this->update_patients(): $this->create_patients();
    }
}
$user = new User();
?>