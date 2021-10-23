<?php
// tablica indeksowana
$person1 = array('Janusz', 'Nowak', 20, 10 => 5, 1 => "Kowalski");
print_r($person1);
echo "<br><br>";

// tablica asocjacyjna
  $car = array(
    'brand' => "Ferrari",
    'model' => "F430",
    'length' => 200,
    'price' => 1500000.5
  );
  echo "<pre>";
  print_r($car);
  echo "</pre>";

  // typy danych
  foreach ($car as $key => $value) {
    echo "$key data type: ".gettype($value)."<br>";
  }
  echo "<hr>";

  //tablica wielowymiarowa
  $person = array(
    array("Jan", "Nowak", 173),
    array("Anna", "Strączykowska", 160),
    array("Kaśka", "Kowalska")
  );
  // print_r($person);

  // foreach ($person as $key => $value) {
  //   echo "Imię: $value[0], Nazwisko: $value[1], Wzrost: $value[2] <br>";
  // }

  // foreach ($person as $key => $value) {
  //   echo "<pre>";
  //   print_r($person[$key]);
  //   echo "</pre>";
  // }

  foreach ($person as $key => $value) {
    $count=$key+1;
    echo "Tablica: ".$count."<br>";
    echo <<<PERSON
      Imię: $value[0], Nazwisko: $value[1]
  PERSON;
  if (isset($value[2])) {
    echo ", wzrost ".$value[2].".cm<br>";
  }
  echo "<br>";
  echo "<br>Ilość elementów tablicy: ".count($person);
  }
 ?>
