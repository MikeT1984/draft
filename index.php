<?php
class Model
{
    public $name;
    public $fuel;
    public function __construct($name = null, $fuel = null)
    {
        $this->name = $name;
        $this->fuel = $fuel;
    }
    public function run($distance = null)
    {
        $this->fuel -= $distance * 0.15;
        echo  "{$this->name} проехал {$distance} км топлива осталось {$this->fuel} литров <br>";
    }
    public function info ()
    {
     echo " {$this->name} заправлен на {$this->fuel} литров горючего <br>";
    }
    // public function attack(Tank $target){
    // echo "{$this->name} выстрелил по {$target->$this->name} и нанес {$this->damage} урона <br> ."
    // }

}
$tractor = new Model("Трактор", 100);
$tractor->info();
$tractor->run(20);
var_dump($tractor);
