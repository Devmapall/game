<?php

session_start();

class Session {

    const dbname = "mvc";
    const table = "sessions";
    const dbuser = "root";
    const dbpass = "";

    private $db = null;
    private $input;
    private $data = array();

    public function __construct($input) {
        $this->input = $input;
        $this->db = new PDO("mysql:dbname=" . self::dbname . ";host=localhost", self::dbuser, self::dbpass);
    }

    public function load() {
        if ($id = $this->input->cookie("PHPSESSID")) {
            $stmt = $this->db->query("SELECT data FROM sessions WHERE ID = '" . $id . "'");
            if (is_object($stmt) && $stmt->rowCount() == 1) {
                $result = $stmt->fetchObject();
                $this->data = unserialize($result->data);
                return true;
            } else {
                return false;
            }
        }
    }

    public function create() {

        $id = $this->input->cookie("PHPSESSID");
        $agent = get_browser(null, true);
        $ip = $this->input->server("REMOTE_ADDR");
        $time = time();
        $sql = "INSERT INTO " . self::table . " (ID, agent, ip, last_activity, data)"
                . " VALUES ('" . $id . "','" . $agent["browser_name_pattern"] . "', '" . $ip . "','" . $time . "','" . serialize($this->data) . "');";
        $this->db->query($sql);
    }

    public function update() {
        $id = $this->input->cookie("PHPSESSID");
        $sql = "UPDATE sessions SET last_activity = '" . time() . "', data = '" . serialize($this->data) . "' WHERE ID = '" . $id . "'";
        $this->db->query($sql);
    }

    public function close() {
        $id = $this->input->cookie("PHPSESSID");
        $sql = "DELETE FROM sessions WHERE ID = '" . $id . "'";
        $this->db->query($sql);
    }

    public function set($index, $value) {
        $this->data[$index] = $value;
        $this->update();
    }

    public function get($index) {
        if (isset($this->data[$index])) {
            return $this->data[$index];
        } else {
            return false;
        }
    }

    public function getAll() {
        return $this->data;
    }

}
