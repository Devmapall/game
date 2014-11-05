<?php
namespace Skill;

abstract class Skill {
    protected $needed_xp = 0;
    protected $xp_type = "";
    protected $skill_mods = array();
    protected $abilities = array();
    protected $name = "";
    
    public function getName() {
        return $this->name;
    }
    public function getSkillMod($name) {
        $return = null;
        foreach($this->skill_mods as $mod) {
            if($mod->getAttribute == $name) {
                $return = $mod;
            }
        }
        return $return;
    }
    
    public function getSkillMods() {
        return $this->skill_mods;
    }
    
    public function isLearnable() {
        $session = new Session();
        $data = $session->load();
        var_dump($data);
    }
    
}