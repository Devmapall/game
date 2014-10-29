<?php
namespace Skill;

class SkillFactory {
    
    private $gate;
    
    public function __construct() {
        $this->gate = new SkillGateway();
    }
    
    public function getMeleeTree() {
        $skills = $this->gate->getTreeSkills("melee");
        echo"<pre>";
        var_dump($skills);
        echo"</pre>";
    }
}
