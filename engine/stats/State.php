<?php
namespace Stats;

interface State {
    
    public function activate();
    public function deactivate();
    public function getStateRounds();
}
