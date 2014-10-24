<?php
namespace Core;

class AbstractGateway {
    
    protected $pdo;
    
    public function __construct() {
        $this->pdo = new \PDO('mysql:host=localhost;dbname=game','root','',NULL);
    }
}
