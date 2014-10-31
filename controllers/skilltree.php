<?php

class Skilltree extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function melee() {
        $fac = new Skill\SkillFactory();
        $data["tree"] = $fac->getMeleeTree();
        var_dump($data["tree"]);
        $this->view("melee_tree",$data);
    }
    
    public function range() {
        $this->view("range_tree");
    }
    
    public function medic() {
        $this->view("medic_tree");
    }
}

