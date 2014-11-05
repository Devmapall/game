<?php
namespace Ability;

interface Ability {
    public function execute($caller,$target);
}
