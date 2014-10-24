<?php
namespace Character;
use Core;
use Skill;

class GenerationGateway extends Core\AbstractGateway {
    
    public function getNPCIDs() {
        $sql = "SELECT ID FROM npc;";
        $stmt = $this->pdo->query($sql);
        $ids = array();
        while($row = $stmt->fetchAll()) {
            $ids[] = $row["ID"];
        }
        return $ids;
    }
    
    public function getNPC($id) {
        $genfac = new GenotypeFactory();
        $sql = "SELECT * FROM npc WHERE ID = ".$id;
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetchObject();
        $char = new Character();
        $char->setId($id);
        $char->setMaxHealth($row->maxhealth);
        $char->setMaxMind($row->maxmind);
        $char->setMaxPower($row->maxpower);
        $char->setHealth($row->health);
        $char->setPower($row->power);
        $char->setMind($row->mind);
        $gen = $genfac->getGenotypeByChar($id);
        $char->setGen($gen);
        $sql = "SELECT * FROM npc_buff WHERE NPC_ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        if($stmt->rowCount() > 0) {
            foreach($stmt->fetchAll() as $row) {
                $name = "Skill\\".$row["buff"];
                $buff = new $name($row["rounds"]);
                $char->addBuff($buff);
            }
        }
        return $char;
    }
    
    public function saveBuff($buff,$char) {
        $parts = explode("\\",get_class($buff));
        $sbuff = $parts[1];
        $id = $char->getID();
        $sql = "SELECT ID FROM npc_buff WHERE NPC_ID = ".$id." AND buff = '".$sbuff."';";
        $stmt = $this->pdo->query($sql);
        if($stmt->rowCount() == 0) {
            $sql = "INSERT INTO npc_buff (NPC_ID, buff, rounds) VALUES (".$id.", '".$sbuff."', ".$buff->getRounds().");";
            $this->pdo->query($sql);
        }
    }
    
    public function saveCharStats($char) {
        $sql = "UPDATE npc SET health = ".$char->getHealth().", power = ".$char->getPower().", mind = ".$char->getMind()." WHERE ID = ".$char->getID().";";
        $this->pdo->query($sql);
    }
    
    public function updateBuffRounds($target,$buff) {
        $parts = explode("\\",get_class($buff));
        $sbuff = $parts[1];
        if($buff->getRounds() == 0 ) {
            $sql = "DELETE FROM npc_buff WHERE NPC_ID = ".$target->getID()." AND buff = '".$sbuff."';"; 
        } else {
            $sql = "UPDATE npc_buff SET rounds = ".$buff->getRounds()." WHERE NPC_ID = ".$target->getID()." AND buff = '".$sbuff."';";
        }
        $this->pdo->query($sql);
    }
}
