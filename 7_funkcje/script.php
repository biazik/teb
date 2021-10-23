<?php
  session_start();
  if(!empty($_POST)){
    // print_r wyswietlimy tablice, echo nie xd
    // foreach pobiera wszystko z $_POST
    foreach ($_POST as $key => $value) {
      if (empty($value)) {
        $_SESSION['error'] = "Wypełnij wszystkie pola";
        header('location: ../7_funkcje/index.php');
        exit();
      }
    }
    foreach ($_POST as $key => $value) {
      $_SESSION['data'][$key]=$value;
    }
    header('location: ../7_funkcje/result.php');
  }
    else{
      $_SESSION['error'] = "Wypełnij formularz!";
      header('location: ../7_funkcje/index.php');
    }
 ?>
