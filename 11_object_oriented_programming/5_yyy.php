<?php
class Person{
  public $publiczna="publiczna";
  protected $chroniona="chroniona";
  private $prywatna="prywatna";
  public function getChroniona(){
    return $this->chroniona;
  }
  public function getPrywatna(){
    return $this->prywatna;
  }
  public function setChroniona($x){
    $this->chroniona=$x;
  }
  public function setPrywatna($x){
    $this->prywatna=$x;
  }

}
$ob= new Person();
echo $ob->publiczna;
echo "<br>";
echo $ob->getChroniona();
echo "<br>";
echo $ob->getPrywatna();
echo "<br>";
$ob->setChroniona("CHRONIONA");
echo $ob->getChroniona();
echo "<br>";
$ob->setPrywatna("PRYWATNA");
echo $ob->getPrywatna();

 ?>
