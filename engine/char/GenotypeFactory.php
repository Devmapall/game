<?php
namespace Character;

class GenotypeFactory {

    private $gate;
    
    public function __construct() {
        $this->gate = new GenotypeGateway();
    }
    
    public function getGenotypeByChar($id) {
        $ids = $this->gate->getGenotypeIDsByCharID($id);
        $genotype = new Genotype();
        foreach($ids as $gid) {
            $genotype->addAttribute($this->getGenotype($gid));
        }
        return $genotype;
    }
    
    private function getGenotype($id) {
        $val = $this->gate->getGenotype($id);
        $gen = new GenotypeAttribute($val["name"], $val["value"]);
        return $gen;
    }
}
