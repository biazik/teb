<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strona główna</title>
  </head>
  <body>
    <!--
include dodaje plik
include_once sprawdza czy juz byl dodany wczesniej i nie doda
require wrzuca plik i tak, jebac include_once
require once no tak samo jak include_once. Różnica polega na tym, że include wywali błąd i leicmy dalej, a require
sie obrazi i nie bedzie ladowalo dalej strony.
   -->
    <h3>Strona główna</h3>
    Początek strony <br>
      <?php
        include "folder/plik.php";
       ?>
    Koniec strony
  </body>
</html>
