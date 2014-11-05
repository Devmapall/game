<?php
namespace Skill;

class Defense_II extends Skill {
    //put your code here
    public function __construct() {
        $this->name = "Defense II";
        $this->skill_mods[] = new SkillMod("melee_def", 20);
        $this->skill_mods[] = new SkillMod("range_def", 5);
        $this->skill_mods[] = new SkillMod("def_knockdown", 10);
        $this->needed_xp = 2000;
        $this->xp_type = "combat";
    }
}
