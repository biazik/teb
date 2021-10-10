<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      echo PHP_VERSION,"<br>";
      // echo phpinfo();
      echo 2**10,"<br>"; //1024

      $dec=12;
      $bin=0b1100;
      $oct=010;
      $hex=0xC;
      echo "<hr>$dec<br>";
      echo "<hr>$bin<br>";
      echo "<hr>$oct<br>";
      echo "<hr>$hex<hr>";

      $i=1;
      echo $i++; //1
      echo $i; //2
      echo ++$i; //3
      $y=$i++;
      echo $i; //4
      echo $y; //3
      $i=++$i;
      echo $i;//5
      $i=$y++;
      echo $i; //3
      echo $y; //4
      $i=$i++;
      echo $i;//3
      echo "<hr>";


      $x=2;
      echo $x++; //2
      echo ++$x; //4
      echo ++$x; //5
      echo $x; //5
      $y=$x++;
      echo $y; //5
      $y=++$x;
      $x=$x++;
      echo $x; //7 miałem 8, tak to reszta git
      echo --$y; //6



     ?>

  </body>
</html>
