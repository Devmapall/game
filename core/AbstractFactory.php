<?php
namespace MVC;

abstract class AbstractFactory extends MVC\Core {
    abstract public function create($id);
    abstract public function getAll();
}
