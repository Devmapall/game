<?php
namespace Battle;
use Character;

class Battle {
    
    private $char1;
    private $char2;
    private $rounds;
    private $charGate;
    private $active;
    
    public function __construct($id1,$id2) {
        $this->charGate = new Character\GenerationGateway();
        $this->char1 = $this->charGate->getNPC($id1);
        $this->char2 = $this->charGate->getNPC($id2);
    }
    
    public function getChar1() { return $this->char1; }
    public function getChar2() { return $this->char2; }
    public function setActive($char) {
        $this->active = $char;
    }
    public function setRounds($rounds) {
        $this->rounds = $rounds;
    }
}
