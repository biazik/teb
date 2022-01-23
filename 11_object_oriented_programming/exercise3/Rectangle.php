<?php
class Rectangle{
  protected $a, $b;
  public function __construct($a, $b){
    $this->a=$a;
    $this->b=$b;
  }
  public function count(){
    return $this->a*$this->b;
  }
  // public function count(){
  //   return $this->a*$this->b;
  // }
}
 ?>
