<?php
Namespace MVC;

require_once("Session.php");
require_once("Input.php");
require_once("Controller.php");
require_once("AbstractGateway.php");
require_once("AbstractFactory.php");
require_once("XSSFilter.php");
require_once("JSON.php");

define("BASEPATH", "");

class Core {

    protected $session;
    protected $input;
    protected $lang = "de";

    protected function __construct() {
        $this->input = new MVC\Input();
        $this->session = new MVC\Session($this->input);
        $clean = XSSFilter::filter($_SERVER["REQUEST_URI"]);
        $addition = explode("indexphp", $clean);

        if (isset($addition[1])) {
            $values = explode("/", $addition[1]);


            if (isset($values[1]) && $values[1] != '') {
                $this->lang = $values[1];
            }
        }
    }

    private function loadClass($name) {
        $path = "models/" . lcfirst($name) . "/" . ucfirst($name) . ".php";

        if (is_file($path)) {
            require_once($path);
        } else {
            require_once("errors/fileNotFound.php");
        }
    }

    protected function factory($name) {
        $this->loadClass($name);

        $path = "models/" . lcfirst($name) . "/" . ucfirst($name) . "Factory.php";

        if (file_exists($path)) {
            require_once($path);
            $fac = $name . "Factory";
            return new $fac();
        } else {
            require_once("errors/fileNotFound.php");
        }
    }

    protected function gateway($name) {
        $path = "models/" . lcfirst($name) . "/" . ucfirst($name) . "Gateway.php";

        if (file_exists($path)) {
            require_once($path);
            $fac = $name . "Gateway";
            return new $fac();
        } else {
            require_once("errors/fileNotFound.php");
        }
    }

    protected function view($file, array $params = null) {

        if (isset($params) && is_array($params)) {
            extract($params);
        }

        $path = "views/" . $this->lang . "/" . ucfirst($file) . ".php";
        if (file_exists($path)) {
            require_once($path);
        } else {
            require_once("errors/fileNotFound.php");
        }
    }
    
    protected function base_url() {
        return "http://euve1560.vserver.de/test/game/index.php/".$this->lang."/";
    }
    
    protected function ref_url() {
        return "http://euve1560.vserver.de/test/game/";
    }
    
    protected function redirect($location) {
        header("Location: ".$this->base_url().$location);
        exit();
    }

}
