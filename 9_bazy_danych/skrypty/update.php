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
  // $sql = "UPDATE `users` SET ('".$_POST['city_id']."','".$_POST['name']."','".$_POST['surname']."','".$_POST['birthday']."')";
  // $sql = "INSERT INTO `users` (`city_id`, `name`, `surname`, `birthday`) VALUES ('".$_POST['city_id']."','".$_POST['name']."','".$_POST['surname']."','".$_POST['birthday']."')";

  $sql = "UPDATE `users` SET `name` = '".$_POST['name']."', `surname` = '".$_POST['surname']."', `city_id` = '".$_POST['city_id']."', `birthday` = '".$_POST['birthday']."' WHERE `users`.`user_id` = '".$_POST['user_id']."';";
  // echo "INSERT INTO `users` (`city_id`, `name`, `surname`, `birthday`) VALUES ('".$_POST['city_id']."','".$_POST['name']."','".$_POST['surname']."','".$_POST['birthday']."')";
  // $result = $con->query($sql);
  if($con->query($sql)){
    echo "<script>alert('Aktualizacja zakończona z sukcesem')</script>";
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
