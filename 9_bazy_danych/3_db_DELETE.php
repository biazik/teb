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
    session_start();
      if (!empty($_SESSION['delete_info'])){
        echo "<script type='text/javascript'>alert('".$_SESSION['delete_info']." ".$_SESSION['deleted_id']."');</script>";
        unset($_SESSION['delete_info']);
        $_SESSION['deleted_id']="";
        unset($_SESSION['deleted_id']);
      }


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
            <th>Kliknij, aby usunąć</th>
          </tr>

      TABLE;

      while ($row = $result->fetch_assoc()) {
        echo <<< USER
          <tr>
            <td>$row[user_id]</td>
            <td>$row[name]</td>
            <td>$row[surname]</td>
            <td>$row[birthday]</td>
            <td><a href=./delete_cell.php?id=$row[user_id]>█████████████</a></td>
          </tr>

USER;
      }
      echo "</table>";
     ?>
  </body>
</html>
