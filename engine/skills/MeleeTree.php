<?php
namespace Skill;

class MeleeTree implements SkillTree {
    
    private $skills = array(array());
    
    public function __construct() {
        for($i=0;$i<4;$i++) {
            for($j=0;$j<4;$j++) {
                $this->skills[$i][$j] = NULL;
            }
        }
    }
    
    public function addSkill($x,$y, $skill) {
        if($skill instanceof Skills\Skill) {
            $this->skills[$x][$y] = $skill;
        }
    }
    
    public function getSkill($x,$y) {
        return $this->skills[$x][$y];
    }
}
