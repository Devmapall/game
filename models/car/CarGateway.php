<?php

class CarGateway extends AbstractGateway {
   
    public function __construct() {
        $this->table = "car";
        parent::__construct();
    }
    
    public function getById($id) {
        $result = $this->querySingle($id);
        return $result;
    }
}
