<!-- Użytkownik wprowadza ilość osób w rodzinie JEST
Po wprowadzeniu wyświetli mu się formularz który będzie mógł wprowadzić imię nazwisko i wzrost JEST
Po zatwierdzeniu formularza wyświetli mu Formularz JEST
Ile jest osób o danym imieniu oraz wyświetli średni wzrost z zaokrągleniem do 2 miejsc po przecinku POTEM, ZROBIONY WZROST
Dodatkowo przefiltruj dane pod kątem białych znaków JEST
Wyślij wszystkie pobrane dane za pomocą sesji JEST
Dodaj je ze zmiennej sesyjnej do tabilcy o nazwie rodzina tablica wielowymiarowa JEST -->
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Family</title>
  </head>
  <body>
    <form action="" method="get">
      <input type="number" style="width:200px;"name="how_many" placeholder="Podaj liczbę członków rodziny">
      <input type="submit" name="send" value="Przejdź dalej">
    </form>
    <?php
      session_start(); // ma wyswietlac sesją wiec najpierw rozpoczynamy sesję.
      if (isset($_GET['send'])) {
        echo "<h3>Podaj dane członków rodziny</h3>";
        echo "<form class='' action='script.php' method='post'>";
        for ($i=1; $i <= $_GET['how_many']; $i++) {
          echo "Imię: <input type='text' name='<?php echo $i; ?>[imie]' required value=''>";
          echo "Nazwisko: <input type='text' name='<?php echo $i; ?>[nazwisko]' required value=''>";
          echo "Wzrost: <input type='text' name='<?php echo $i; ?>[wzrost]' required value='0'><br><br>";
        }
        echo "<input type='submit' value='Podsumowanie'>";
        echo "</form>";
      }
     ?>
  </body>
</html>
