<?php
// Napisz program, który obliczy pole prostokąta //oop Użytkownik podaje dane z klawiatury w formularzu.
/* 1) Definicja klasy
  2) Strona z formularzem
  3) Dołączenie definicji klasy do strony ze skryptem
  4) Wyświetlenie rezultatu */
if (isset($_POST['button'])) {
  foreach ($_POST as $value) {

    $string = $value;
    $pattern = '/[,]/';
    $replacement = '.';

    $value = preg_replace($pattern, $replacement, $string);

    if (!is_numeric($value)) {
      if ($value == "Oblicz pole") {
        continue;
      }
      else {
        echo "ERROR: Wartości muszą być liczbowe";
        exit();
      }
    }


  }
  require_once("Rectangle.php");
  $class = new Rectangle;
  $class->a=$_POST['a'];
  $class->a=$_POST['b'];
  echo "Pole prostokąta o podanych przekątnych wynosi: ".$class->count()."cm<sup>2</sup>";
}

// if (isset($_POST['a']) && isset($_POST['b'])) {
//   if (is_numeric($_POST['a']) && is_numeric($_POST['b'])){
//     if ($_POST['a']>0 && $_POST['b']>0) {
//       require_once("Rectangle.php");
//       $class = new Rectangle;
//       $class->a=$_POST['a'];
//       $class->b=$_POST['b'];
//       echo "Pole prostokąta o podanych przekątnych wynosi: ".$class->count()."cm<sup>2</sup>";
//     }
//     else {
//       echo "Wartości muszą być dodatnie";
//     }
//   }
//   else {
//     echo "Wartości muszą być liczbami";
//   }
// }
// else {
//   echo "Wypełnij wszystkie pola";
// }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form method="post">
       <input type="text" name="a" value="">
       <input type="text" name="b" value="">
       <input type="submit" name="button" value="Oblicz pole">
     </form>
   </body>
 </html>
