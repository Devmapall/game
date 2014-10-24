<?php

class CarFactory extends AbstractFactory {
    private $gate;
    
    public function __construct() {
        $this->gate = $this->gateway("car");
    }
    
    public function create($id) {
        $data = $this->gate->getById($id);
        $car = new Car();
        $car->setId($data->ID);
        $car->setManufacturer($data->manufacturer);
        $car->setModel($data->model);
        $car->setColor($data->color);
        $car->setHp($data->hp);
        return $car;
    }
    
    public function getAll() {
        $ids = $this->gate->getAll();
        return $ids;
    }
}
