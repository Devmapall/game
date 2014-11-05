<?php
namespace Ability;
use Character;

class Attack implements Ability {
    
    public function __construct($rounds=5) {
        $this->rounds = $rounds;
    }

    public function execute($caller, $target) {
        $gate = new Character\GenerationGateway();
        $health = $caller->getHealth() - ($caller->getMaxHealth() * 0.02);
        $caller->setHealth($health);
        $power = $caller->getPower() - ($caller->getMaxPower() * 0.1);
        $caller->setPower($power);
        $gate->saveCharStats($target);
    }
}