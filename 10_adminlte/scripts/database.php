<?php
if (!isset($_SESSION)) {
  session_start();
}
require_once "connect.php";
$key=$_SESSION['user_key'];
$sql = "SELECT * FROM `users` WHERE `id` = '$key'";
$result = $connect->query($sql);
$data= $result->fetch_assoc();
$_SESSION['database']['users']=$data;
 ?>
