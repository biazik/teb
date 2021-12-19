 <?php
 session_start();

//jeżeli ktoś wszedł tutaj z buta, czyli prosto pod ten link, to go wywalamy.
if (empty($_POST)) {
  header('location: ../');
  exit();
}
else {
  require_once '../functions/regex.php';
  require_once '../scripts/connect.php';
  //Regexujemy maila, żeby był wg. szablonu bazy, inaczej mail paTKa1@gmAIL.com nie bedzie pasował do Patka1@gmail.com, więc to konieczne.
  if(stringRegex($_POST['email'],'email')){
      $email = stringRegex($_POST['email'],'email');
  } else {
    $_SESSION['error']="Pole adresu email wypełnione nieprawidłowo.";
      header('location: ../');
      exit();
  }
  //Sprawdzamy czy dany mail istnieje, przy okazji pobieramy reszte danych, żeby niepotrzebnie nie wysyłać co chwila pytań do bazy danych.
  $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
  $result = $connect->query($sql);
  $user= $result->fetch_assoc();
  if (empty($user)) {
    $_SESSION['error']="Błędny email lub hasło.";
    header('location: ../');
    exit();
  }
  else {
    //Sprawdzamy hasło, nie regexujemy go, ponieważ regex był potrzebny do określenia ile ma być znaków itd, hasło sZp3!! ma wyglądać tak samo tu i tu xD
    if (password_verify($_POST['password'],$user['password'])){
      // Sprawdzamy czy status konta użytkownika jest inny niż "aktywne", jeżeli tak, to wyświetlamy mu dlaczego nie może się zalogować.
      if ($user['activity_id']!=2) {
        //Jakby ktoś nie wiedział, te 3 komendy są niezbędne do wyciągnięcia czegokolwiek z bazy danych
        $sql = "SELECT description FROM `activity` WHERE `activity_id` = '$user[activity_id]'";
        $result = $connect->query($sql);
        $info = $result->fetch_assoc();
        //Tutaj pobraliśmy z bazy opis danego stanu konta i wyświelamy go użytkownikowi
        $_SESSION['error'] = "$info[description]";
        header('location: ../');
        exit();
      }
      //pobieranie miasta xd NEI DZIALA
      // $sql = "SELECT * FROM `cities` INNER JOIN `users` ON `cities`.`city_id` = `users`.`city_id` WHERE `users`.`id` = $user[id];";
      // $result = $connect->query($sql);
      // $city_info = $result->fetch_assoc();

      // Ustawiamy $_SESSIONY do użycia na stronie głównej
      // $_SESSION['logged']['city']=$city_info
      $sql = "SELECT role_id FROM userrole INNER JOIN users ON users.id = userrole.user_id WHERE users.id=10;";
      $result = $connect->query($sql);
      $role = $result->fetch_assoc();
      $_SESSION['logged']['role_id']=$role['role_id'];
      $_SESSION['logged']['user']=$user;
      header('location: ../pages/logged/home.php');
      exit();
    }
    else {
      $_SESSION['error'] = "Błędny email lub hasło.";
      header('location: ../');
    }
  }

}
?>
