<?php
namespace Skill;

interface Ability {
    public function execute($caller,$target);
}
