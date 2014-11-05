<?php
namespace Ability;
use Character;

class Poison implements Ability,Buff {
    
    private $rounds;
    
    public function __construct($rounds=5) {
        $this->rounds = $rounds;
    }
    
    public function run($target) {
        $gate = new Character\GenerationGateway();
        if($this->rounds > 0) {
            $max = $target->getMaxHealth();
            $new_health = $target->getHealth() - ($max * 0.02);
            $target->setHealth($new_health);
            $this->rounds--;
            $gate->saveCharStats($target);
            $gate->updateBuffRounds($target, $this);
        } else {
            $gate->updateBuffRounds($target, $this);
        }
    }

    public function execute($caller, $target) {
        $gate = new Character\GenerationGateway();
        $mind = $caller->getMind() - ($caller->getMaxMind()*0.1);
        $caller->setMind($mind);
        $gate->saveCharStats($target);
        $caller->addBuff($this);
        $gate->saveBuff($this,$caller);
    }
    
    public function getRounds() {
        return $this->rounds;
    }
}