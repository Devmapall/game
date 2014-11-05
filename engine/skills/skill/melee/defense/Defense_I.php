<?php
namespace Skill;
use Ability;

class Defense_I extends Skill {
    //put your code here

    public function __construct() {
        $this->skill_mods[] = new SkillMod("melee_def",10);
        $this->skill_mods[] = new SkillMod("range_def",5);
        $this->skill_mods[] = new SkillMod("def_knockdown",10);
        $this->needed_xp = 1000;
        $this->xp_type = "combat";
        $this->name = "Defens I";
    }      
}
