<?php
namespace Skill\Melee;
use Skill;

class MeleeTree implements Skill\Skilltree {
    
    private $skills = array();
    
    public function __construct() {
        $this->skills[0][0] = new Skill\Focus_I();
        $this->skills[0][1] = new Skill\Technique_I();
        $this->skills[0][2] = new Skill\Striking_I();
        $this->skills[0][3] = new Skill\Defense_I();
        $this->skills[1][0] = new Skill\Focus_II();
        $this->skills[1][1] = new Skill\Technique_II();
        $this->skills[1][2] = new Skill\Striking_II();
        $this->skills[1][3] = new Skill\Defense_II();
        $this->skills[2][0] = new Skill\Focus_III();
        $this->skills[2][1] = new Skill\Technique_III();
        $this->skills[2][2] = new Skill\Striking_III();
        $this->skills[2][3] = new Skill\Defense_III();
        $this->skills[3][0] = new Skill\Focus_IV();
        $this->skills[3][1] = new Skill\Technique_IV();
        $this->skills[3][2] = new Skill\Striking_IV();
        $this->skills[3][3] = new Skill\Defense_IV();
    }
    
    public function getSkill($x,$y) {
        return $this->skill[$y][$x];
    }
}
