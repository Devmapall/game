<?php
namespace Character;

class Genotype {
    
    private $attributes;
    
    public function addAttribute($attr) {
        $this->attributes[] = $attr;
    }
    
    public function getGenotypeValue($name) {
        foreach($this->attributes as $attr) {
            if($attr->getName() == $name) {
                return $attr->getValue();
            }
        }
    }
    
    public function printGenotypeList() {
        foreach($this->attributes as $attr) {
            echo $attr->getName().": ".$attr->getValue()."<br>";
        }
    }
    
    public function mutate() {
        foreach($this->attributes as $a) {
            //$a->mutate();
        }
    }
    
    public function getDNAString() {
        $string = "";
        foreach($this->attributes as $att) {
            $string .= $att->getHexValue();
        }
        return $string;
    }
    
    public function setDNA($string) {
        $chunks = chunk_split($string,2);
        $parts = explode("\r\n",$chunks);
        unset($parts[10]);
        foreach($parts as $k=>$p) {
            $this->attributes[$k]->setHexValue($p);
        }
    }
}
