<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formularze i inne przydatne pierdoły</title>
  </head>
  <body>
    <?php

    /*
Komentarz w wielu liniach xd, można też dać shift slash i zrobi sie samo, ale nie akurat to jednolinioowe, ale jednak.
dodawanie .= kropki przed = dodaje cos do stringa, konkatenacja, wazna rzecz, mozna dodac szybko jakies dane do stringa w petli chociazby
interpolacja = przecinek xD
interpolacja jest szybsza od konkatenacji.

gettype() zajebista funkcja pokazujaca typ danych

postikrementacja i++
preinkrementacja ++i
postdekrementacja i--
predekrementacja --i
    */

    // .= konkatenacja

    $name="janusz";
    $surname="kowalski";
    $text="<br>Imię i nazwisko: ";
    $text .= "$name $surname";
    echo $text;

    // , interpolacja

    echo "<br>imię ", "i nazwisko";

     ?>
  </body>
</html>
