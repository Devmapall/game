<?php

class Skilltree extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function melee() {
        $this->view("melee_tree");
    }
    
    public function range() {
        $this->view("range_tree");
    }
    
    public function medic() {
        $this->view("medic_tree");
    }
}

