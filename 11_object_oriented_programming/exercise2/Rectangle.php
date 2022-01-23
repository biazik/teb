<?php
class Rectangle{
  public $a, $b;
  public function __construct($a, $b){
    $this->a=$a;
    $this->b=$b;
  }
  public function count(){
    return $this->a*$this->b;
  }
}
 ?>
