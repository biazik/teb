<?php
/*
Utwórz klasę abstrakcyjną o nazwie Figura geometryczna
Zdefiniuj w tej klasie licznik utworzonych figur (static)
Dodaj w niej konstruktor i destruktor
Dodaj metody abstrakcyjne: pole, obwód, rysuj.

Dodaj klasę dziedziczącą po klasie Figura geometryczna
Wywołaj metodę unset, która usunie obiekt.
*/

interface Calculations{
  public function area();
  public function circuit();
}

abstract class Geometric_figure implements Calculations{
  protected static $howManyFigures = 0;
  public function __construct(){
    Geometric_figure::$howManyFigures++;
  }
  public static function getHowManyFigures(){
    return Geometric_figure::$howManyFigures;
  }
  public static function setHowManyFigures($howManyFigures){
    $this->howManyFigures=$howManyFigures;
  }
  public $draw;
}

class Rectangle extends Geometric_figure{
  public float $width, $height;
  public function __construct($width, $height, $draw){
    parent::__construct();
    $this->width=$width;
    $this->height=$height;
  }
  public function area(){
    return $this->width * $this->height;
  }
  public function circuit(){
    return 2 * $this->width + 2 * $this->height;
  }
  public function showData(){
    echo " Pole: ".$this->area()."cm<sup>2</sup> Obwód: ".$this->circuit()."cm Rysuj: ".$this->draw;
  }
}

$square = new Rectangle(5,2,"tak");
echo $square->showData();
echo "<br>Ile figur: ";
echo Geometric_figure::getHowManyFigures();

unset($square);

echo "<br><br>";

class Circle extends Geometric_figure{
  public float $ray;
  public function __construct($ray){
    parent::__construct();
    $this->ray=$ray;
  }
  public function area(){
    return pi() * $this->ray * $this->ray;
  }
  public function circuit(){
    return 2 * pi() * $this->ray;
  }
  public function showData(){
    echo " Pole: ".round($this->area(), 2)."cm<sup>2</sup> Obwód: ".round($this->circuit(), 2)."cm Rysuj: ".$this->draw;
  }
}

$circle = new Circle(7);
echo $circle->showData();
echo "<br>Ile figur: ";
echo Geometric_figure::getHowManyFigures();

unset($square);
 ?>
