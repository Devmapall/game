<?php
namespace Character;

class CharacterFactory {
    
    public function __construct() {
        
    }
    
    public function createNPC($id) {
        
    }
    
    public function getCharacter($id) {
        $gate = new CharacterGateway();
        $bfac = new BuffFactory();
        $row = $gate->getCharacter($id);
        $char = new Character();
        $char->setId($id);
        $char->setName($row->name);
        $char->setMaxHealth($row->maxhealth);
        $char->setMaxMind($row->maxmind);
        $char->setMaxPower($row->maxpower);
        $char->setHealth($row->health);
        $char->setPower($row->power);
        $char->setMind($row->mind);
        //$gen = $genfac->getGenotypeByChar($id);
        //$char->setGen($gen);
        $states = $gate->getCharacterAttributes($id);
        foreach($states as $name=>$val) {
            $char->setState($name, $val);
        }
        
        $skills = $gate->getCharacterSkills($id);
        foreach($skills as $skill) {
            $char->setSkill(new $skill());
        }
        
        $buffs = $bfac->createBuffsByChar($id);
        if(count($buffs) > 0) {
            foreach($buffs as $buff) {
                $char->addBuff($buff);
            }
        }
        return $char;
    }
}
