<?php
require_once 'car.php';
class Model{
  // Potrzebuje tutaj: Full auto, Auto po marce, Auto po kolorze.
  public function CarsList(){
    require_once './controller/connect.php';
    $sql = "SELECT * FROM `cars`";
    $result = $con->query($sql);
    $temp_car = array();
    while ($row = $result->fetch_assoc()) {
      $temp_car[] = new Car($row['brand'], $row['model'], $row['price'], $row['color']);
    }
    return $temp_car;
    // var_dump($temp_car);
  }
  public function CarByColor($color){
    require_once './controller/connect.php';
    $sql = "SELECT * FROM `cars` WHERE `color` = '".$color."'";
    $result = $con->query($sql);
    echo "<b>Now showing only color: \"$color\". <a href='?'>Go back to the full list</a></b>";
    $temp_carC = array();
    while ($row = $result->fetch_assoc()) {
      $temp_carC[] = new Car($row['brand'], $row['model'], $row['price'], $row['color']);
    }
    return $temp_carC;
    // var_dump($temp_carC);
  }
  public function CarByBrand($brand){
    require_once './controller/connect.php';
    $sql = "SELECT * FROM `cars` WHERE `brand` = '".$brand."'";
    $result = $con->query($sql);
    echo "<b>Now showing only brand: \"$brand\". <a href='?'>Go back to the full list</a></b>";
    $temp_carB = array();
    while ($row = $result->fetch_assoc()) {
      $temp_carB[] = new Car($row['brand'], $row['model'], $row['price'], $row['color']);
    }
    return $temp_carB;
  }
}
 ?>
