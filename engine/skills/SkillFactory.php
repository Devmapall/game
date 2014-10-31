<?php
namespace Skills;

class SkillFactory {
    
    private $gate;
    
    public function __construct() {
        $this->gate = new SkillGateway();
    }
    
    public function getMeleeTree() {
        $skills = $this->gate->getTreeSkills("melee");
        $tree = new MeleeTree();
        foreach($skills as $y=>$skill) {
            foreach($skill as $x=>$s) {
                $skill = $this->getSkill($s["ID"]);
                $tree->addSkill($x, $y, $skill);
            }
        }
    }
    
    public function getSkill($id) {
        $data = $this->gate->getSkill($id);
        echo"<pre>";
        var_dump($data);
        echo"</pre>";
    }
}
