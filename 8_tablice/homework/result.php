<?php session_start();
//tak jak my kasujemy tabice rodzina po wyswitleniu to rzucamy osobe na strone glównom jak niema dannych
if(!isset($_SESSION['rodzina'])){
  $_SESSION['error'] = "Not autorized acces";
  header('location: ./index.php');
}

?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wprowadzone dane</title>
    <link rel="stylesheet" href="./css/master.css">

  </head>
  <body>
    <h3>Dane osób wprowadzonych do tablicy</h3>
    <table>
      <tr>
    <th>#</th>
    <th>Imię</th>
    <th>Nazwisko</th>
    <th>Wzrost</th>
  </tr>
  <?php
  $count = 1; //ilosć osób
  $heightAll = 0; //sredni wzrost
  $names = array(); //tablica dla imion
    foreach ($_SESSION['rodzina'] as $value) {
      echo "<tr>";
          echo "<td>$count</td>";
          //jeżeli takie imie istniej w tablice names zwiększamy na 1, jeżeli nie to dodajemy do tablicy
          if (array_key_exists($value['imie'], $names)) {
            $names[$value['imie']]++;
          } else {
            $names[$value['imie']] = 1;
          }
          $heightAll += $value['wzrost']; //dodajemy wzros osoby z rodziny
      foreach ($value as $member) {
        echo "<td>$member</td>"; // echo dane osoby
      }
      $count++; //to jest tylko dla wyprowadzanie danych
      echo "</tr>";
    }
    //kasujemy tablice rodziny
    unset($_SESSION['rodzina']);
   ?>
    </table>
    <br><br>
    <h3>Ilość powtórzeń imion</h3>
    <table>
      <tr>
    <th>Imię</th>
    <th>Ilość</th>
  </tr>

    <?php foreach ($names as $key => $value) {
      echo "  <tr><td>$key</td>";
      echo "<td>$value</td></tr>";
    } ?>

  </table>

  <h3>Sredni wzros czlonków rodziny</h3>
  <!-- dwa znaki po przecinku -->
  <?php echo  number_format($heightAll / ($count-1), 2);  ?>
  </body>
</html>
