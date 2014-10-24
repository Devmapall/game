<?php
namespace Skill;
use Character;

class Infusion implements Skill,Buff {
    
    private $rounds;
    
    public function __construct($rounds=5) {
        $this->rounds = $rounds;
    }
    
    public function run($target) {
        $gate = new Character\GenerationGateway();
        if($this->rounds > 0) {
            $max = $target->getMaxHealth();
            $new_health = $target->getHealth() + ($max * 0.025);
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
        $power = $caller->getPower()-$caller->getMaxPower()*0.1;
        $caller->setPower($power);
        $gate->saveCharStats($target);
        $caller->addBuff($this);
        $gate->saveBuff($this,$caller);
    }
    
    public function getRounds() {
        return $this->rounds;
    }
}
