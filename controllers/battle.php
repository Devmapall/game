<?php

class Test extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($id) {
        $fac = new Battle\BattleFactory();
        $battle = $fac->getBattle($npc);
        $this->view('battle');
    }
}