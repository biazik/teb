<?php
class Car{
  public $brand, $model, $price, $color;
  public function __construct($pbrand, $pmodel, $pprice, $pcolor){
    $this->brand=$pbrand;
    $this->model=$pmodel;
    $this->price=$pprice;
    $this->color=$pcolor;
  }
}
 ?>
