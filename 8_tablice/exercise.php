<!-- Dodaj formularz, w którym użytkownik podaje ile ma ulubionych kolorów. Wygeneruj na tej podstawie formularz.
Dodaj dane do tablicy
Wykorzystaj funkcję stałkową do zamiany danych na małe litery.
Przypisz dane z formularza do nowej tablicy.
Posortuj nową tablicę niemalejąco, według nazwy.
Wyświetl ile ulubionych kolorów ma user.
Wyświetl te kolory w formacie (Kolor 1: ....  Kolor 2: ....) -->

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ulubione kolory</title>
  </head>
  <body>
    <div id="formularz">
    <h4>Ile masz ulubionych kolorów?</h4>
    <form method="post">
      <input type='number' name='countColor' placeholder="Ile masz ulubionych kolorów?"/>
      <input type='submit' value='Wyślij'/>

    </form>
    <?php
      if(isset($_POST['countColor'])){
        echo "<br><br>";
        echo "Podaj swoje ulubione kolory";
        echo "<form method='post' action='skrypt.php'>";
        for ($i=1; $i <= $_POST['countColor']; $i++) {
          echo "<input type='text' name='color$i' placeholder='podaj $i kolor'> <br>";
        }
        echo "<input type='submit' value='Wyślij'/>";
        echo "</form>";
      }
     ?>
  </div>
  </body>
</html>
