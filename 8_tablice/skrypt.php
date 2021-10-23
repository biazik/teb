<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $colors = [];
    foreach ($_POST as $key => $value) {
      $value = strtolower(trim($value));
      array_push($colors, $value);
      sort($colors);
    }
    echo "<br>";
    echo "<pre>";
    print_r($colors);
    echo "</pre>";
     ?>
  </body>
</html>
