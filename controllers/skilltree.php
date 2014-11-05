<?php

class Skilltree extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function melee() {
        $data["tree"] = new Skill\MeleeTree();
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
        $name = str_replace(" ", "_",$name);
        $skill = new $name;
        $skill->isLearnable();
        $mods = $skill->getSkillMods();
        $array = array();
        foreach($mods as $mod) {
            $array [] = array($mod->getAttribute(), $mod->getModifier());
        }
        echo json_encode($array);
    }
}