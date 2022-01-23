<?php
class A{
  public function __construct(){
    echo "Konstruktor z klasy bazowej";
  }
}
class B extends A{
  public function __construct(){
    echo "Konstruktor z klasy potomnej";
  }
}

$objA = new A();
$objB = new B();
 ?>
