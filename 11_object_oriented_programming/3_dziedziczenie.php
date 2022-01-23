<?php
class Animal{
  public $name, $age;
  public function __construct(){
    echo "Konstryktor Animal <br>";
  }
  public function showData(){
    return "Imię i wiek: ".$this->name." ".$this->age;
  }
}

class Snake extends Animal{
  public $venomous="JADOWITY";
  public function __construct(){
    parent::__construct();
    echo "Konstryktor Snake <br>";
  }
  public function showData(){
    return "Czy wąż jest jadowity?: ".$this->venomous;
  }
}

$pies = new Animal;
$pies->name="Luna";
$pies->age="2";
echo $pies->showData();
 ?>
