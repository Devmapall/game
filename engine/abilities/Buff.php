<?php
namespace Ability;

interface Buff {
    public function run($target);
    public function getRounds();
}
