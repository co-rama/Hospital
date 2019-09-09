<?php
class Session{
    private $logged_in = false;
    public $position = "";
    public $user_id;
    
    function __construct(){
        session_start();
        $this->check_login();
        if($this->logged_in){
            //do this action
        }else{
            //do this function
        }  
    }
    public function is_logged_in(){
        return $this->logged_in;
    }
    
    public function login($user){
        //db to find user based on id
        if($user){
            $this->user_id = $_SESSION['id'] = $user->id;
            $this->position = $_SESSION['position'] = $user->position;
            $this->logged_in = true; 
        }
    }
        //check first if logged in
    private function check_login(){
        if(isset($_SESSION['id']) && isset($_SESSION['position'])){
            $this->user_id = $_SESSION['id'];
            $this->position = $_SESSION['position'];
            $this->logged_in = true;
        }else{
            unset($this->position);
            unset($this->user_id);
            $this->logged_in = false;
        }
    }
    public function logout(){
        unset($_SESSION['position']);
        unset($_SESSION['id']);
        unset($this->position);
        unset($this->user_id);
        $this->logged_in = false;
    }
    
}
$session = new Session();
?>