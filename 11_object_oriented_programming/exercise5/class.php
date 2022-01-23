<?php
abstract class Animal{
  public int $weight, $age;
  public string $can_see, $can_breath, $carnivore_herbivore;
  protected string $owner;
  public function getOwner($owner){
    $this->owner=($owner);
  }
}
abstract class Fish extends Animal{
  public $can_swim;
}
abstract class Mammal extends Animal{
  public $can_run;
}
abstract class Bird extends Animal{
  public $can_fly;
}
class Whale extends Mammal{
  public $ocean, $body_length, $is_pregnant;
  public function showData(){
    echo "<br><b>Wieloryb</b>:<br>Dane podstawowe:<br>Waga: ".$this->weight."<br>Wiek: ".$this->age."<br>Czy widzi: ".$this->can_see."<br>Czy oddycha: ".$this->can_breath."<br>Mięsożerca/Roślinożerca: ".$this->carnivore_herbivore."<br>Właściciel: ".$this->owner;
    echo "<br>Dane dla gatunku Ssak:<br>Czy biega: ".$this->can_run;
    echo "<br>Dane dla zwierzęcia Wieloryb:<br>Ocean:".$this->ocean."<br>Długość ciała: ".$this->body_length."<br>Czy w ciąży: ".$this->is_pregnant;
  }
}
class Eagle extends Bird{
  public $own_top_speed, $breeding_area;
  // $breeding_area = Obszar lęgowy
  public function showData(){
    echo "<br><br><b>Orzeł</b>:<br>Dane podstawowe:<br>Waga: ".$this->weight."<br>Wiek: ".$this->age."<br>Czy widzi: ".$this->can_see."<br>Czy oddycha: ".$this->can_breath."<br>Mięsożerca/Roślinożerca: ".$this->carnivore_herbivore."<br>Właściciel: ".$this->owner;
    echo "<br>Dane dla gatunku Ptak:<br>Czy lata: ".$this->can_fly;
    echo "<br>Dane dla zwierzęcia Orzeł:<br>Największa prędkość własna:".$this->own_top_speed."<br>Obszar lęgowy: ".$this->breeding_area;
  }
}
// Whale
$whale1 = new Whale;
$whale1->weight=42000;
$whale1->age=87;
$whale1->can_see="true";
$whale1->can_breath="true";
$whale1->carnivore_herbivore="carnivore";
$whale1->getOwner("Mike Wazowsky");
$whale1->can_run="false";
$whale1->ocean="Atlantic Ocean";
$whale1->body_length="29M";
$whale1->is_pregnant="false";

echo $whale1->showData();

// Eagle1
$Eagle1 = new Eagle;
$Eagle1->weight=2;
$Eagle1->age=6;
$Eagle1->can_see="true";
$Eagle1->can_breath="true";
$Eagle1->carnivore_herbivore="carnivore";
$Eagle1->getOwner("Anonymous Guy");
$Eagle1->can_fly="true";
$Eagle1->own_top_speed="128Km/h";
$Eagle1->breeding_area="Beskid Żywiecki";

echo $Eagle1->showData();
 ?>
