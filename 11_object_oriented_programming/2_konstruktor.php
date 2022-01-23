<?php
class Person{
    public $name, $surname, $city;
    public function __construct($name, $surname=null, $city=null){
      $this->name=$name;
      $this->surname=$surname;
      $this->city=$city;
    }
    public function __destruct();
    public function showData(){
      return "Imię i nazwisko: ".$this->name." ".$this->surname."<br> Miasto: ".$this->city;
    }
}
$kowal= new Person("Janusz", "Kowalski");
echo $kowal->showData();
echo "<br/>";
$kowa1l= new Person("Marian", NULL , "Poznań");
echo $kowa1l->showData();
 ?>
