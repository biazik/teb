<?php
abstract class Vehicle{
  public string $brand, $model;
  protected string $owner="";
  public function setOwner($owner){
    $this->owner=$owner;
  }
}

class Bike extends Vehicle{
  public float $chainLength;
  public function showData(){
    return "Marka: ".$this->brand." Model: ".$this->model." Właściciel: ".$this->owner;
  }
}

$rower= new Bike();
$rower->brand="Romet";
$rower->model="City Crossroad";
$rower->chainLength=30;
$rower->setOwner("Kowalski");
echo $rower->chainLength;
echo "<br>";
echo $rower->showData();

echo "Metody obiektu rower";
foreach (get_class_methods($rower) as $method) {
  echo $method;
}

 ?>
