<?php
namespace Skill;

class SkillGateway extends \Core\AbstractGateway {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getMeleeTree() {
        
    }
    
    public function getTreeSkills($tree) {
        $sql = "SELECT s.ID, s.x, s.y FROM skills as s "
                . "INNER JOIN skilltree as st ON (s.tree = st.ID) "
                . "WHERE st.tree = '".$tree."';";
        $stmt = $this->pdo->query($sql);
        $skills = array(array());
        foreach($stmt->fetchAll() as $row) {
            $skills[$row["y"]][$row["x"]] = $row["ID"];
        }
        return $skills;
    }
    
    public function getSkill($id) {
        $sql = "SELECT * FROM skills WHERE ID = ".$id.";";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchObject();
    }
    
    
}
