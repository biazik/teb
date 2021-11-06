<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Users</title>
    <link rel="stylesheet" href="./style/style.css">
  </head>
  <body>
    <h1>Users</h1>
    <?php
      require_once('./skrypty/connect.php');
      $sql = "SELECT * FROM `users` INNER JOIN `cities` ON users.city_id=cities.city_id;";
      $result = $con->query($sql);

      echo <<< TABLE
        <table id=customers>
          <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Data urodzenia</th>
          </tr>

      TABLE;

      while ($row = $result->fetch_assoc()) {
        echo <<< USER
          <tr>
            <td>$row[user_id]</td>
            <td>$row[name]</td>
            <td>$row[surname]</td>
            <td>$row[birthday]</td>
          </tr>

USER;
      }
      echo "</table>";
     ?>
  </body>
</html>
