<?php
namespace Skill;

interface Buff {
    public function run($target);
    public function getRounds();
}
