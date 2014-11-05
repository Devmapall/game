<?php
namespace Character;
use Skill;
use Stats;

class Character {
    
    private $id;
    private $name;
    private $maxHealth;
    private $maxPower;
    private $maxMind;
    private $health;
    private $power;
    private $mind;
    private $buffList = array();
    private $attributes = array();
    private $skills = array();

    public function getBuffList() {
        return $this->buffList;
    }
    
    public function addBuff($buff) {
        if($buff instanceof Skill\Buff) {
            $this->buffList[] = $buff;
        }
    }
    
    public function runBuffs() {
        if(is_array($this->buffList) && count($this->buffList) > 0) {
            foreach($this->buffList as $buff) {
                $buff->run($this);
            }
        }
    }
    
    public function learnSkill($skill) {
        if(!in_array($skill, $this->skills)) {
            $gate = new CharacterGateway();
            $gate->addCharacterSkill($this->id, $skill);
        }
    }
    
    public function setSkill($skill) {
        $this->skills[$skill->getName()] = $skill;
    }
    
    public function getSkills() {
        return $this->skills;
    }
    
    public function getSkill($name) {
        return $this->skills[$name];
    }
        
    public function setAttribute($name,$value) {
        $this->attributes[$name] = $value;
    }
    
    public function getAttributes() {
        return $this->attributes;
    }
    
    public function getAttribute($name) {
        return $this->attributes[$name];
    }
    
    public function changeStateTo($state) {
        if($state instanceof \Stats\State) {
            if(!in_array(get_class($state),$this->states)) {
                $this->states[] = get_class($state);
            }
        }
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getHealth() {
        return $this->health;
    }

    public function getPower() {
        return $this->power;
    }

    public function getMind() {
        return $this->mind;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function setHealth($health) {
        $this->health = $health;
    }

    public function setPower($power) {
        $this->power = $power;
    }

    public function setMind($mind) {
        $this->mind = $mind;
    }
    
    public function getMaxHealth() {
        return $this->maxHealth;
    }

    public function getMaxPower() {
        return $this->maxPower;
    }

    public function getMaxMind() {
        return $this->maxMind;
    }

    public function setMaxHealth($maxHealth) {
        $this->maxHealth = $maxHealth;
    }

    public function setMaxPower($maxPower) {
        $this->maxPower = $maxPower;
    }

    public function setMaxMind($maxMind) {
        $this->maxMind = $maxMind;
    }

    public function useSkill($skill,$target) {
        if($skill instanceof Skill\Skill) {
            $skill->execute($this,$target);
        }
    }
}
