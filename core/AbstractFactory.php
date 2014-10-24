<?php
require_once("Core.php");

abstract class AbstractFactory extends Core {
    abstract public function create($id);
    abstract public function getAll();
}
