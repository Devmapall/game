<?php
namespace Skill;

interface Skill {
    public function execute($caller,$target);
}
