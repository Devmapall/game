<?php
namespace Character;

class NPC extends Character {
    
    private $gen;
    
    public function __construct($dna = null) {
        if($dna) {
            $gen = new Genotype();
            $gen->setDNA($dna);
            $this->gen = $gen;
        }
    }
    
    public function setGen($gen) {
        $this->gen = $gen;
    }
    
    public function getGen() {
        return $this->gen;
    }
}
