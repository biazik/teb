<?php
class User{
// właściwości klasy
  public $name, $surname;
  public int $age;

// metody klasy
  public function showName(){
    echo "Imię: ".$this->name;
  }
  public function showData(){
    return "test";
  }
}

$nowak = new User();
$nowak->name="Janusz";
$nowak->surname="Nowak";
// print_r($nowak);
echo "$nowak->name $nowak->surname <br/>";

echo $nowak->name;
echo $nowak->surname;
echo "<br>";
$nowak->age="29";
echo $nowak->age;
echo "<br/>";
$nowak->showName();
$nowak->showData();
 ?>
