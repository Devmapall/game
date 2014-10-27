<?php
namespace Character;
use Core;

class BuffGateway extends Core\AbstractGateway {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getBuffsByChar($id) {
        $sql = "SELECT * FROM npc_buff WHERE NPC_ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        $buffs = array();
        foreach($stmt->fetchAll() as $row) {
            $buffs[] = array("buff"=>$row->buff,"rounds"=>$row->rounds);
        }
        return $buffs;
    }
}
