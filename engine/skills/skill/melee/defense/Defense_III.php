<?php
namespace Skill;

class Defense_III extends Skill {
    //put your code here
    public function __construct() {
        $this->name = "Defense III";
        $this->skill_mods[] = new SkillMod("melee_def", 30);
        $this->skill_mods[] = new SkillMod("range_def", 15);
        $this->skill_mods[] = new SkillMod("def_knockdown", 20);
        $this->needed_xp = 5000;
        $this->xp_type = "combat";
    }
}
