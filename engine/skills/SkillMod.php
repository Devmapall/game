<?php
namespace Skill;

class SkillMod {
    //put your code here
    private $attribute = "";
    private $modifier = 0;
    
    public function __construct($attribute, $modifier) {
        $this->attribute = $attribute;
        $this->modifier = $modifier;
    }
    
    public function getAttribute() {
        return $this->attribute;
    }

    public function getModifier() {
        return $this->modifier;
    }

    public function setAttribute($attribute) {
        $this->attribute = $attribute;
    }

    public function setModifier($modifier) {
        $this->modifier = $modifier;
    }

}
