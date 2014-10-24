<?php
require_once("Database.php");
abstract class AbstractGateway extends Database {
    
    protected $table = "undefined";
    
    public function __construct() {
        parent::__construct();
    }
    
    protected function querySingle($id) {
        $st = $this->db->prepare("SELECT * FROM ".$this->table." WHERE ID = ?;");
        $st->execute(array($id));
        return $st->fetchObject();
    }
    
    public function getAll() {
        $st = $this->db->prepare("SELECT ID FROM ".$this->table." ORDER BY ID ASC;");
        $st->execute(array());
        $array = $st->fetchAll();
        $return = array();
        foreach($array as $k => $el) {
            $return[] = $el["ID"];
        }
        return $return;
    }
}
