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
    
    public function getCharacterSkillMods($id) {
        $sql = "SELECT g.name as name, cd.value as value FROM char_data as cd "
                . "INNER JOIN genotype as g ON (cd.Genotype_ID = g.ID) "
                . "WHERE cd.Char_ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        $data = array();
        foreach($stmt->fetchAll() as $row) {
            $data[$row["name"]] = $row["value"];
        }
        return $data;
    }
}
