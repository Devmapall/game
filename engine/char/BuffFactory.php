<?php
namespace Character;

class BuffFactory {
    
    private $gate;
    
    public function __construct() {
        $this->gate = new BuffGateway();
    }
    
    public function createBuffsByChar($id) {
        $buffs = $this->gate->getBuffsByChar($id);
        $return = array();
        if(count($buffs) > 0) {
            foreach($buffs as $row) {
                $name = "Skill\\".$row["buff"];
                $buff = new $name($row["rounds"]);
                $return[] = $buff;
            }
        }
        return $return;
    }
}
