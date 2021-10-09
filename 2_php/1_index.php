<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Strona główna</title>
  </head>
  <body>
    <p>Strona główna</p>
    <?php
      $name='janusz';
      $surname='nowak';
      echo "imie: $name <br>";
      echo "nazwisko: $surname <hr>";

// heredoc
  echo <<< LABEL
  Imię i nazwisko: $name $surname<br>
  Kurs Programowania<br>
LABEL;
  $text = <<< LABEL
  <hr>
  Imię i nazwisko: $name $surname<br>
  Kurs Programowania<br>
LABEL;


// nowdoc
$text = <<< 'LABEL'
<hr>
Imię i nazwisko: $name $surname<br>
Kurs Programowania<br>
LABEL;

  echo $text;

     ?>
  </body>
</html>
