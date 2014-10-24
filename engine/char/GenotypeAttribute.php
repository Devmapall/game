<?php
namespace Character;

class GenotypeAttribute {
    private $value;
    private $name;
    
    public function __construct($name,$value) {
        $this->name = $name;
        $this->value = $this->dec2hex((int)$value);
    }
    
    private function dec2hex($value) {
        if((int)$value <= 10) {
            return "0".dechex($value);
        } else {
            return dechex($value);
        }
    }
    
    public function setHexValue($hex) {
        $this->value = $hex;
    }
    
    private function hex2dec($value) {
        return hexdec($value);
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getValue() {
        return $this->hex2dec($this->value);
    }
    
    public function getHexValue() {
        return $this->value;
    }
    
}
