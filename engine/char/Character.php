<?php
namespace Character;
use Skill;

class Character {
    
    private $id;
    private $gen;
    private $maxHealth;
    private $maxPower;
    private $maxMind;
    private $health;
    private $power;
    private $mind;
    private $buffList = array();
    private $stat;
    private $skillMods = array();
    private $skills;
    
    public function __construct($dna = null) {
        if($dna) {
            $gen = new Genotype();
            $gen->setDNA($dna);
            $this->gen = $gen;
        }
    }

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
    
    public function getId() {
        return $this->id;
    }

    public function getGen() {
        return $this->gen;
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

    public function setGen($gen) {
        $this->gen = $gen;
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
