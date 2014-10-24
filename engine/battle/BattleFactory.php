<?php
namespace Battle;

class BattleFactory {
    
    private $gate;
    
    public function __construct() {
        $this->gate = new BattleGateway();
    }
    
    public function getBattle($npc) {
        $battles = $this->gate->getBattlesOfNPC($npc);
        if(count($battles) === 1) {
            $data = $this->gate->getBattle($battles[0]);
            $battle = new Battle($data->npc1,$data->npc2);
            $battle->setActive($data->active);
            $battle->setRounds($data->rounds);
            return $battle;
        } else {
            throw new Exception("BattleCountException");
        }
    }
    
    public function createBattle($npc1,$npc2) {
        $this->gate->createBattle($npc1, $npc2);
    }
    
    public function saveBattle($battle) {
        $this->gate->updateBattle($battle);
    }
}
