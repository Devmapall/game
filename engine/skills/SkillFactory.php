<?php
namespace Skill;

class SkillFactory {
    
    private $gate;
    
    public function __construct() {
        $this->gate = new SkillGateway();
    }
    
    public function getMeleeTree() {
        $skills = $this->gate->getTreeSkills("melee");
        $tree = new MeleeTree();
        echo"<pre>";
        foreach($skills as $y=>$skill) {
            foreach($skill as $x=>$s) {
                $skill = $this->getSkill($s["ID"]);
                $tree->addSkill($x, $y, $skill);
            }
        }
        echo"</pre>";
    }
    
    public function getSkill($id) {
        $data = $this->gate->getSkill($id);
        
    }
}
