<?php
class Number{
  public static $number=10;
  public static function showNumber(){
    return "Wartość pola number: ".Number::$number;


  }
}

echo Number::$number;
echo Number::showNumber();
 ?>
