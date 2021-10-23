<h4>Funkcje strzałkowe</h4>
<?php

  function cube($n){
    return ($n * $n * $n);
  }
  $age=[1, 2, 3, 4, 5, 6];
  $b = array_map('cube', $age);
  print_r($b);

//
  echo "<hr>";
  function validateName($name){
    return ucfirst(strtolower(trim($name)));
  }
  $names=["jANuSz", "aGniEszka", "MICHał"];
  $validateNames=array_map('validateName', $names);
  print_r($validateNames);

//
  echo "<br>";
  $salary=[3500, 7700, 2900, 12000];
  $salaryIncrease=array_map(function($salary){
    return $salary*1.15;
  }, $salary);
  print_r($salary);
  echo "<br>";
  print_r($salaryIncrease);

//
  echo "<br>";
  echo "<br>";
  $salary=[3500, 7700, 2900, 12000];
  $salaryIncrease=array_map(fn($salary):float=>$salary*1.15, $salary);
  print_r($salary);
  echo "<br>";
  print_r($salaryIncrease);
 ?>
