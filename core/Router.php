<?php
Namespace MVC;

class Router extends MVC\Core {

    private $controller = "welcome";
    private $method = "index";
    private $params = array();

    public function __construct() {
        $clean = XSSFilter::filter($_SERVER["REQUEST_URI"]);
        $addition = explode("indexphp", $clean);

        if (isset($addition[1])) {
            $values = explode("/", $addition[1]);

            if (isset($values[2]) && $values[2] != '') {
                $this->controller = $values[2];
            }

            if (isset($values[3]) && $values[3] != '') {
                $this->method = $values[3];
            }

            for ($i = 4; $i <= count($values) - 1; $i++) {
                $this->params[] = $values[$i];
            }

            
        }
        
        $this->load();
    }

    private function load() {
        $path = "controllers/" . $this->controller . ".php";

        if (file_exists($path)) {
            require_once($path);
            $name = ucfirst($this->controller);
            $c = new $name();
            call_user_func_array(array($c, $this->method), $this->params);
        } else {
            require_once("errors/fileNotFound.php");
        }
    }

}
