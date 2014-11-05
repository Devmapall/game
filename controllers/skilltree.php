<?php

class Skilltree extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function melee() {
        $data["tree"] = new Skill\Melee\MeleeTree();
        $this->view("melee_tree",$data);
    }
    
    public function range() {
        $this->view("range_tree");
    }
    
    public function medic() {
        $this->view("medic_tree");
    }
    
    public function getSkill() {
        $name = "Skill\\".$this->input->post("skillName");
        $skill = new $name;
        echo json_encode($skill->getSkillMods());
    }
}