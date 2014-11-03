<?php

class Skilltree extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function melee() {
        $data["tree"] = new Skill\Melee\MeleeTree();
        echo "<pre>";
        var_dump($data["tree"]);
        echo "</pre>";
        var_dump($data["tree"]->getSkill(0,0));
        $this->view("melee_tree",$data);
    }
    
    public function range() {
        $this->view("range_tree");
    }
    
    public function medic() {
        $this->view("medic_tree");
    }
}

