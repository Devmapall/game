<?php
namespace Battle;
use Core;

class BattleGateway extends Core\AbstractGateway {    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function createBattle($char1,$char2) {
        $b1 = $this->getBattleOfNPC($char1);
        $b2 = $this->getBattleOfNPC($char2);
        
        if(empty($b1) && empty($b2)) {
            $sql = "INSERT INTO battle (npc1,npc2,starter) VALUES (".$char1.",".$char2.",1);";
            $this->pdo->query($sql);
        }
    }
    
    public function getBattlesOfNPC($npc_id) {
        $sql = "SELECT ID FROM battle WHERE npc1 = ".$npc_id." OR npc2 = ".$npc_id.";";
        $stmt = $this->pdo->query($sql);
        $battles = array();
        foreach($stmt->fetchAll() as $row) {
            $battles = $row["ID"];
        }
        return $battles;
    }
    
    public function updateBattle($battle) {
        $sql = "UPDATE battle SET rounds = ".$battle->getRounds().", active = ".$battle->getActiveNPC()." WHERE ID = ".$battle->getID();
        $this->pdo->query($sql);
    }
    
    public function getBattle($id) {
        $sql = "SELECT * FROM battle WHERE ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        if($stmt->rowCount() === 1) {
            return $stmt->fetchObject();
        } else {
            throw new Exception("BattleCountException ".$id);
        }
    }
}
