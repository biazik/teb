<?php
if (isset($_POST['button'])) {
  $a=$_POST['a'];
  $b=$_POST['b'];
  $a= str_replace(",",".","$a");
  $b= str_replace(",",".","$b");
  if (!is_nan($a) AND !is_nan($b)) {
    if ($a>0 AND $b>0) {
      $obw=$a+$a+$b+$b;
      $pole=$a*$b;
      echo <<< odp
      Twój prostokąt ma boki równe $a cm i $b cm.<br>
      Pole Twojego prostokąta ma $pole cm<sup>2</sup>.
      Obwód Twojego prostokąta wynosi $obw cm.
      odp;
    }
    else {
      echo "Wprowadź prawidłowe dane";
    }
  }
}
 ?>
