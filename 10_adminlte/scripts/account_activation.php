<?php
session_start();
require_once '../scripts/connect.php';
//Jeżeli istnieje zmienna activation link i email idzemy dalej, w innym wypadku wyswietlimy errora
if (isset($_GET['activation_link']) and isset($_GET['email'])) {
  //tak gdyby ktoś nie wiedział, to po prostu to przypisywanie zmiennych, żeby pisać $link, a nie tą dłuższą wersję co chwilę.
  $link = $_GET['activation_link'];
  $email = $_GET['email'];
  //pobieramy info kiedy zostalo utworzone konto, jakie ma id i emaila uzytkownika xD
  // $sql = "SELECT created_at, user_id, users.email,link  FROM activation_link INNER JOIN users ON user_id = users.id  WHERE users.email = '$email';";
$sql = "SELECT activation_link.created_at, user_id, users.email,link  FROM activation_link INNER JOIN users ON user_id = users.id  WHERE users.email = '$email';";
  $result = $connect->query($sql);
  $row = $result->fetch_assoc();

  //Tu jest taka moja funkcja, która obliczy ile dni minęło od dnia założenia, jeżeli więcej niż 7 to usuwamy link aktywacyjny oraz usera. Nie jest to za bardzo automatyczne, bo widzę, że dużo roboty, ale daje możliwość usunięcia usera jeżeli ten postanowi przypomnieć sobie o linku za 3 lata :v
    function iledni($date1, $date2)
      {
        // liczymy diffrence, różnicę między dniami
        $diff = strtotime($date2) - strtotime($date1);

        //86400 to po prostu jeden dzień w sekundach, abs i round zaokrągla te wartości, nie będziemy źli jak user zaktywuje konto godzinę po 7 dniach itd, a nie będziemy robili syfu w obliczeniach.
        return abs(round($diff / 86400));
    }
  //data z komórki w mysqlu
  $date1 = $row['created_at'];
  //aktualna data
  $date2 = date("Y/m/d");
  //wywołujemy funkcję z podanymi danymi
  $iledni = iledni($date1, $date2);

  //Przed jakimikolwiek operacjami na tych rekordach sprawdzamy, czy link aktywacyjny się zgadza, bo email już wiemy, że w bazie istnieje.
  if ($link == $row['link']) {
    //Tu sprawdzamy czy link jest starszy niż 7 dni, jeżeli tak, dane oraz link aktywacyjny zostają usunięte z bazy danych, użytkownik jest powiadamiany stosownym komunikatem, jeżeli jednak nie, to dodajemy go do bazy.
    if ($iledni<7) {
      $sql = "UPDATE users SET activity_id=2 WHERE id=$row[user_id]";
      $connect->query($sql);
      $sql1 = "DELETE FROM activation_link WHERE user_id=$row[user_id]";
      $connect->query($sql1);
      $_SESSION['error']="Twoje konto zostało aktywowane.";
      header('location: ../');
      exit();
    }
    else {
      $sql = "DELETE FROM activation_link WHERE user_id=$row[user_id]";
      $sql1 = "DELETE FROM users WHERE id=$row[user_id]";
      $connect->query($sql);
      $connect->query($sql1);
      $_SESSION['error']="Twój link aktywacyjny wygasł. Dane użytkownika zostały usunięte. Zarejestruj się ponownie, aby korzystać z serwisu.";
      header('location: ../');
      exit();
    }
  }
  else {
    $_SESSION['error']="Link aktywacyjny jest błędny, skontaktuj się z administratorem strony.";
    header('location: ../');
    exit();
  }
}
else {
  $_SESSION['error']="Link aktywacyjny jest błędny, skontaktuj się z administratorem strony.";
  header('location: ../');
  exit();
}
?>
