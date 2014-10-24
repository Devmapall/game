<?php
namespace Character;
use Core;

class GenotypeGateway extends Core\AbstractGateway {
    
    public function getGenotypeIDsByCharID($id) {
        $sql = "SELECT ID FROM npc_genotype WHERE NPC_ID = ".$id;
        $stmt = $this->pdo->query($sql);
        $ids = array();
        foreach($stmt->fetchAll() as $row) {
            $ids[] = $row["ID"];
        }
        return $ids;
    }
    
    public function getGenotype($id) {
        $sql = "SELECT g.name, ng.value FROM npc_genotype as ng "
                . "INNER JOIN genotype as g ON (g.ID = ng.Genotype_ID) "
                . "WHERE ng.ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        $gen = array();
        foreach($stmt->fetchAll() as $row) {
            $gen["name"] = $row["name"];
            $gen["value"] = $row["value"];
        }
        return $gen;
    }
}
