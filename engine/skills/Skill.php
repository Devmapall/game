<?php
namespace Skill;

abstract class Skill {
    protected $needed_xp = 0;
    protected $xp_type = "";
    protected $skill_mods = array();
    protected $abilities = array();
    abstract public function apply($caller);
    abstract public function getName();
}