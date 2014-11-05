<?php
namespace Character;
use Core;

class CharacterGateway extends Core\AbstractGateway {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCharacter($id) {
        $sql = "SELECT * FROM `char` WHERE ID = ".$id;
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetchObject();
        return $row;
    }
    
    public function getCharacterAttributes($id) {
        $sql = "SELECT g.name as name, cd.value as value FROM char_attributes as cd "
                . "INNER JOIN genotype as g ON (cd.Genotype_ID = g.ID) "
                . "WHERE cd.Char_ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        $data = array();
        foreach($stmt->fetchAll() as $row) {
            $data[$row["name"]] = $row["value"];
        }
        return $data;
    }
    
    public function getCharacterSkills($id) {
        $sql = "SELECT skill FROM char_skill WHERE Char_ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        $skills = array();
        foreach($stmt->fetchAll() as $row) {
            $skills[] = $row["skill"];
        }
        return $skills;
    }
    
    public function addCharacterSkill($id,$skill) {
        $sql = "INSERT INTO char_skill (char_id, skill, learned) "
                . "VALUES (".$id.", ".get_class($skill).", NOW());";
        $this->pdo->query($sql);
    }
}
