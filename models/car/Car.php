<?php

class Car implements JSON {
    private $id;
    private $manufacturer;
    private $model;
    private $color;
    private $hp;
    
    function __construct() {
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getManufacturer() {
        return $this->manufacturer;
    }

    public function getModel() {
        return $this->model;
    }

    public function getColor() {
        return $this->color;
    }

    public function getHp() {
        return $this->hp;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setHp($hp) {
        $this->hp = $hp;
    }

    public function getJSONData() {
        $val = array(
            "manufacturer" => $this->manufacturer,
            "model" => $this->model,
            "color" => $this->color,
            "hp" => $this->hp
        );
        echo json_encode($val);
    }
}
