<?php
namespace Skill;

class SkillGateway extends Core\AbstractGateway {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getMeleeTree() {
        
    }
    
    public function getTreeSkills($tree) {
        $sql = "SELECT s.ID FROM skills as s"
                . "INNER JOIN skilltree as st ON (s.tree = st.ID)"
                . "WHERE st.tree = '".$tree."';";
        $stmt = $this->pdo->query($sql);
        foreach($stmt->fetchAll() as $row) {
            var_dump($row);
        }
    }
    
    public function getSkill($id) {
        
    }
    
    
}
