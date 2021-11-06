<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Users</title>
  </head>
  <body>
    <h4>Users</h4>
    <?php
      $con = new mysqli("localhost", "root", "", "teb");
      $sql = "SELECT * FROM `users` INNER JOIN `cities` ON users.city_id=cities.city_id;";
      $result = $con->query($sql);

      while ($row = $result->fetch_assoc()) {
        echo <<< USER
          ID: $row[user_id]
          Imię i nazwisko: $row[name] $row[surname] <br>
          Data urodzenia: $row[birthday]
          Miasto: $row[city]
          <hr>

USER;
      }
     ?>
  </body>
</html>
