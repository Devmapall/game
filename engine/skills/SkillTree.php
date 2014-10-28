<?php
namespace Skills;

interface SkillTree {
    public function addSkill($x,$y,$skill);
    public function getSkill($x,$y);
}
