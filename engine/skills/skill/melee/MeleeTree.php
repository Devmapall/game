<?php
namespace Skill;

class MeleeTree implements Skilltree {
    
    private $skills = array();
    
    public function __construct() {
        $this->skills[0][0] = new Focus_I();
        $this->skills[0][1] = new Technique_I();
        $this->skills[0][2] = new Striking_I();
        $this->skills[0][3] = new Defense_I();
        $this->skills[1][0] = new Focus_II();
        $this->skills[1][1] = new Technique_II();
        $this->skills[1][2] = new Striking_II();
        $this->skills[1][3] = new Defense_II();
        $this->skills[2][0] = new Focus_III();
        $this->skills[2][1] = new Technique_III();
        $this->skills[2][2] = new Striking_III();
        $this->skills[2][3] = new Defense_III();
        $this->skills[3][0] = new Focus_IV();
        $this->skills[3][1] = new Technique_IV();
        $this->skills[3][2] = new Striking_IV();
        $this->skills[3][3] = new Defense_IV();
    }
    
    public function getSkill($x,$y) {
        return $this->skills[$y][$x];
    }
}
