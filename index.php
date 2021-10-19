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
        echo "{$this->name} атаковал {$target->name} и нанес ему {$this->damage} урона. <br>";
    }
    public function info()
    {
        parent::info();
        echo "{$this->name} имеет броню в количестве {$this->armor} и силу атаки {$this->damage}. <br>";
    }
}
$tractor = new Model("Трактор", 100);
$tractor->info();
$tractor->run(20);
$tank1 = new WarModel("Танк 1", 100, 200, 50);
$tank2 = new WarModel("Танк 2", 100, 200, 70);
$tank1->info();
$tank2->info();
$tank1->attack($tank2);
$tank2->info();
$tank2->run(150);



// //3. Дан код:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A(); объявление экземпляра класса
// $a2 = new A(); объявление экземпляра класса
// $a1->foo(); выводит 1 префиксная форма инкремента, сначала увеличивается х, потом выводится
// $a2->foo(); выводит 2 так как статический метод принадлежит классу, то значение будет увеличиваться при каждом новом вызове метода
// $a1->foo(); выводит 3
// $a2->foo(); выводи 4
// //Что он выведет на каждом шаге? Почему?
//Немного изменим п.5:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo();  выводит 1
// $b1->foo();  выводит 1
// $a1->foo(); выводит 2
// $b1->foo(); выводит 2
//Так как вызываются экземпляры разных классов, то и увеличение происходит в каждом экземпляре отдельно
//5. *Дан код:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A;
// $b1 = new B;
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo(); 
// //Что он выведет на каждом шаге? Почему?
// Ответ выше )