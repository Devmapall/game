<?php
namespace MVC;

class Database extends Core {

    protected $db;

    const dbname = "DEQV01HW";
    const dbuser = "qlik_admin";
    const dbpass = "Password1!";

    public function __construct() {
        parent::__construct();
        $this->db = new PDO("odbc:" . self::dbname, self::dbuser, self::dbpass);
    }

    protected function query($sql, array $params = null) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        if($stmt->errorCode() !== '00000') {
            var_dump($stmt->errorInfo());
        }
        return $stmt->fetchAll();
    }

}
