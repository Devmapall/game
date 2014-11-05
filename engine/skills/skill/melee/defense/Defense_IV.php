<?php
namespace Skill;

class Defense_IV extends Skill {
    //put your code here
    public function __construct() {
        $this->name = "Defense IV";
        $this->skill_mods[] = new SkillMod("melee_def", 40);
        $this->skill_mods[] = new SkillMod("range_def", 20);
        $this->skill_mods[] = new SkillMod("def_knockdown", 30);
        $this->needed_xp = 10000;
        $this->xp_type = "combat";
    }
}
