<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h3>Dane użytkownika</h3>
    <form method="get">
      <input type="text" name="name" placeholder="Podaj imię (max. 10 znaków)" value=""/><br>
      <input type="text" name="surname" placeholder="Podaj nazwisko" value=""/><br>
      <input type="radio" name="sex" value="m" id="m" checked><label for="m">Mężczyzna</label>
      <input type="radio" name="sex" value="k" id="k"><label for="k">Kobieta</label><br>
      <select name="narodowosc">
        <option value="Polska">Polska</option>
        <option value="Ukraińska">Ukraińska</option>
        <option value="USA">USA</option>
      </select><br>
      <input type="color" name="color"/><br>
      <input type="submit" name="przycisk" value="Zatwierdź"/>

    </form>
<!--
Ctrl shift k usuwa komentarz
ctrl i strzalka gora dol przesuwa linie kodu OP
 -->
    <?php
    if (isset($_GET['przycisk'])) {
        $narodowosc=$_GET["narodowosc"];
      if (!empty($_GET['name']) AND !empty($_GET['surname']) AND !empty($_GET['sex']) AND !empty($_GET['narodowosc']) AND !empty($_GET['color'])) {
          $name = substr(ucfirst(trim(strtolower($_GET["name"]))),0,10);
          $surname = substr(ucfirst(trim(strtolower($_GET["surname"]))),0,15);
        switch ($_GET['sex']) {
          case 'k':
          $plec="Kobietą";
          break;
          default:
          $plec="Mężczyzną";
          break;
        }
        echo <<< DATA
        Twoje imię i nazwisko: $name $surname<br>
        Jesteś $plec<br>
        Twoja narodowość: $narodowosc<br>
        Ulubiony kolor: $_GET[color]
        DATA;
      }
      else {
        echo "WYPEŁNIJ DANE";
      }
    }
     ?>
  </body>
</html>
