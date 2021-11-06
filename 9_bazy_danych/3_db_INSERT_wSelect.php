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
            <th>Kliknij, aby zaktualizować</th>
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
            <td><a href=./update_cell.php?id=$row[user_id]>█████████████</a></td>
          </tr>

USER;
      }
      echo "</table>";

      if (isset($_GET['adduser'])) {
        echo <<< FORMADDUSER
        <h1>Formularz dodawania</h1>
        <form method=post action=./skrypty/insert.php>
        <input type=text placeholder=Imie name=name /><br><br>
        <input type=text placeholder=Nazwisko name=surname /><br>
        <br><select name=city_id>
        FORMADDUSER;
        $sql = "SELECT * FROM `cities`;";
        $result = $con->query($sql);

        while ($city=$result->fetch_assoc()) {
          echo "<option value='".$city['city_id']."'>".$city['city']."</option><br>";
        }
        echo <<< FORMADDUSER
        </select><br>
        <br>Data urodzenia:<input type=date name=birthday /><br><br>
        <input type=submit value=Wyślij/>
        </form>
        FORMADDUSER;
      }
      else {
        echo "<a href='./3_db_INSERT_wSelect.php?adduser='><h1>DODAJ UŻYTKOWNIKA</h1></a>";
      }

     ?>
  </form>
  </body>
</html>
