<?php
Namespace MVC;

class Controller extends Core {
            
    protected function __construct() {
        parent::__construct();
        if(!$id = $this->session->load()) {
            $this->session->create();
        }
    }
}
