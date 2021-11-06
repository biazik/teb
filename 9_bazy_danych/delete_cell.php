<?php
session_start();
require_once('./skrypty/connect.php');
if (!empty($_GET['id'])) {
  $sql="DELETE FROM users WHERE user_id=".$_GET['id'];
  $result = $con->query($sql);

  if ($con->affected_rows) {
    $_SESSION['delete_info']="Pomyślnie usunięto rekord o ID: ";
    $_SESSION['deleted_id']=$_GET['id'];
  }
  else {
    $_SESSION['delete_info']="Nie udało się usunąć rekordu";
  }
}
  header('location: ./4_UPDATE_FINAL.php?alert='.$alert);
 ?>
