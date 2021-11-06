<?php
if (!empty($_POST)) {
  foreach ($_POST as $key => $value) {
    if (empty($value)) {
      echo "<script>alert('Uzupełnij wszystkie pola w formularzu')</script>";
      echo "<script>history.back()</script>";
      exit();
    }
  }
  require_once('./connect.php');
  $sql = "INSERT INTO `users` (`city_id`, `name`, `surname`, `birthday`) VALUES ('".$_POST['city_id']."','".$_POST['name']."','".$_POST['surname']."','".$_POST['birthday']."')";
  // echo "INSERT INTO `users` (`city_id`, `name`, `surname`, `birthday`) VALUES ('".$_POST['city_id']."','".$_POST['name']."','".$_POST['surname']."','".$_POST['birthday']."')";
  // $result = $con->query($sql);
  if($con->query($sql)){
    echo "<script>alert('Dodawanie zakończone z sukcesem')</script>";
    echo "<script>history.back()</script>";
    exit();
  }
  else {
    echo "<script>alert('Wystąpił błąd!')</script>";
    echo "<script>history.back()</script>";
    exit();
  }
}
else {
    header('location: ../4_UPDATE_FINAL.php');
}



 ?>
