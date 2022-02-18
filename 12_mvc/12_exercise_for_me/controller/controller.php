<?php
require_once './model/model.php';
class Controller{
  public $model;
  public function __construct(){
    $this->model = new Model;
  }
  public function ShowCars(){
    // echo "<table><tr><th>Marka</th><th>Model</th><th>Cena</th><th>Kolor</th></tr>";
    if (!isset($_GET['color']) AND !isset($_GET['brand'])) {
      $cars=$this->model->CarsList();
      require_once './view/view.php';
    }
    else {
      if (!isset($_GET['color'])) {
        $cars=$this->model->CarByBrand($_GET['brand']);
        require_once './view/view.php';
      }
      else {
        $cars=$this->model->CarByColor($_GET['color']);
        require_once './view/view.php';
      }
    }
  }
}
 ?>
