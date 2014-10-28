<?php

class User extends Controller {
    
    private $gate;
    
    public function __construct() {
        parent::__construct();
        $this->gate = new Account\AccountGateway();
    }
    
    public function register() {
        if($this->input->post("charname") === false) {
            $this->view("register_form");
        } else {
            var_dump($this->input->post("charname"));
            if($this->validate()) {
                $id = $this->gate->register($this->input->post("username"),$this->input->post("password"),$this->input->post("email"),$this->input->post("charname"));
            }
        }
    }
    
    public function login() {
        $user = $this->input->post("username");
        $pass = $this->input->post("password");
        
        if($user === false || $pass === false) {
            $this->view("login");
        } else {
            $db_pass = $this->gate->getLoginData($user);
            if(hash("sha256",$pass) === $db_pass) {
                $uid = $this->gate->getUserIDByUsername($user);
                $cid = $this->gate->getCharIDByUsername($user);
                $this->session->set(0,$uid);
                $this->session->set(1,$cid);
                $this->redirect("user/showChar");
            }
        }
    }
    
    public function showChar() {
        $cid = $this->session->get(1);
        $fac = new Character\CharacterFactory();
        $char = $fac->createCharacter($cid);
        echo "<pre>";
        var_dump($char);
        echo "</pre>";
        $data["char"] = $char;
        $this->view("char",$data);
    }
    
    private function validate() {
        $valid = true;
        
        if($this->input->post("username") === "") {
            $valid = false;
        } else if($this->input->post("password") === "") {
            $valid = false;
        } else if($this->input->post("charname") === "") {
            $valid = false;
        } else if($this->input->post("email") === "") {
            $valid = false;
        }
        return $valid;
    }
}
