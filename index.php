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
        echo  "{$this->name} проехал {$distance} км ,топлива осталось {$this->fuel} литров <br>";
    }
    public function info()
    {
        echo " {$this->name} заправлен на {$this->fuel} литров горючего <br>";
    }
}

class WarModel extends Model
{
    public $armor;
    public $damage;
    public function __construct($name = null, $fuel = null, $armor = null, $damage = null)
    {
        parent::__construct($name, $fuel);
        $this->damage = $damage;
        $this->armor = $armor;
    }
    public function attack(Model $target)
    {
        $target->armor -= $this->damage;
        echo "{$this->name} атаковал {$target->name} и нанес ему {$this->damage} урона. <br>";}
    public function info(){
        parent:: info();
        echo "{$this->name} имеет броню в количестве {$this->armor} и силу атаки {$this->damage}. <br>";
    }
}
$tractor = new Model("Трактор", 100);
$tractor->info();
$tractor->run(20);
$tank1 = new WarModel("Танк 1",100,200,50);
$tank2 = new WarModel("Танк 2",100,200,70);
$tank1->info();
$tank2->info();
$tank1->attack($tank2);
$tank2->info();
$tank2->run(150);