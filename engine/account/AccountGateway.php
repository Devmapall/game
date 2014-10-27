<?php
namespace Account;
use Core;

class AccountGateway extends Core\AbstractGateway {
    public function __construct() {
        parent::__construct();   
    }
    
    public function register($user,$pass,$email,$char) {    
        $sql = "INSERT INTO account (username, password, email) VALUES ('".$user."', '".hash("sha256",$pass)."', '".$email."');";
        $this->pdo->query($sql);
        $h = $this->value();
        $a = $this->value();
        $m = $this->value();
        $id = $this->pdo->lastInsertId();
        $sql = "INSERT INTO `char` (name,maxhealth,maxpower,maxmind,health,power,mind,Account_ID) VALUES ('".$char."',".$h.",".$a.",".$m.",".$h.",".$a.",".$m.",".$id.");";
        $this->pdo->query($sql);
        $id = $this->pdo->lastInsertId();
        $sql = "SELECT * FROM genotype;";
        $stmt = $this->pdo->query($sql);
        foreach($stmt->fetchAll() as $row) {
            $sql = "INSERT INTO char_data (Char_ID, Genotype_ID, value) VALUES "
                    . "(".$id.", ".$row['ID'].", ".$this->value().");";
            $this->pdo->query($sql);
        }
        return $id;
    }
    
    public function getUserIDByUsername($name) {
        $sql = "SELECT ID FROM account WHERE username = '".$name."';";
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetchObject();
        return $row->ID;
    }
    
    public function getCharIDByUsername($name) {
        $sql = "SELECT c.ID FROM `char` as c INNER JOIN account as a ON (a.ID = c.Account_ID) WHERE a.username = '".$name."';";
        echo $sql;
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetchObject();
        return $row->ID;
    }
    
    public function getLoginData($username) {
        $sql = "SELECT password FROM account WHERE username = '".$username."';";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchObject()->password;
    }
    
    private function value() {
        return rand(90,110);
    }
}
