<?php
  if (isset($_POST)) {
    session_start();
    foreach ($_POST as $key => $value) { //przypisywanie z $_POSTA do $_SESSION wielowymiarowego
      $_SESSION['rodzina']['czlonek'.$key] = $value;
    }
    // foreach ($_SESSION as $key => $value) {
    //   print_r($value['imie']);
    // }
    // Do sprawdzania poprawności wprowadzenia danych do tablicy
    // echo "<pre>";
    // print_r($_SESSION['rodzina']);
    // echo "</pre>";
    // Do niszczenia sesji, jakbym wprowadził jakieś złe dane
    // session_destroy();
    //jeżeli chce podać jakąś wartość z arraya w echo, to muszę wrzucić arraya w foreacha takiego jak poniżej
    $avgheight=0;
    $i=0;
    foreach ($_SESSION['rodzina'] as $value) { //sredni wzrost
      $avgheight=$avgheight+$value['wzrost'];
      $i++;
    }
    $avgheight=$avgheight/$i;
    $i=0;

    $i=1;
    echo "<h3>Lista członków rodziny</h3>";
    foreach ($_SESSION['rodzina'] as $value) { //trimowanie komórek, liczenie powtórzeń oraz listowanie.
      $value['imie'] = trim($value['imie']);
      $value['nazwisko'] = trim($value['nazwisko']);
      echo "ID: ".$i." Imię i nazwisko: ".$value['imie']." ".$value['nazwisko']." Wzrost: ".$value['wzrost']."cm<br>";
      $i++;
    }
    echo "<br><h3>Średni wzrost:</h3>".round($avgheight, 2)."cm"; //wyswietlanie średniego

      $numbers = array();
    foreach ($_SESSION['rodzina'] as $value){
      $value['imie'] = trim($value['imie']);
      $numbers[$value['imie']]++;
    }
    echo "<h3>Liczba powtórzeń imion</h3>";
    foreach ($numbers as $key => $value){
      echo 'Imię '.$key.' powtórzyło się '.$value.' razy.<br/>';
    }

  }
  else {
    header('location: ./index.php');
  }
 ?>
