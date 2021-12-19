<?php
// Bardzo ważna komenda w każdej stronie jeżeli używacie sesji użytkownika do chociażby logowania czy ciasteczek
session_start();
// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
// exit();
// Pętla foreach... Bierze $_POST, czyli to czym wysłaliśmy na tę stronę dane z formularza, wyciąga z arraya te dane, tak, aby można było je łatwiej rozłożyć na proste dane i sprawdza, czy wszystkie pola zostały wypełnione. W razie niewypełnienia ustawia $_SESSION['error'] <- I tu się przydaje session_start(), który wywali na stronie głównej, że nie wpisaliśmy wszystkich danych. Tak dla przypomnienia exit zamyka robienie skryptu, żeby użytkownik nie mógł podejrzeć niczego więcej.
foreach ($_POST as $key => $value) {
  if (empty($value)) {
    $_SESSION['error'] = "Wypełnij wszystkie pola!";
    echo "<script>history.back()</script>";
    exit();
  }
}

//Pozdrowienia dla Hermana, wziąłem od niego tego regexa, bo robiąc go od nowa spędziłbym nad tym dłuższą chwilę :/ Zrobiłem od siebie regexa na numer telefonu, także coś dodałem :p
require_once '../functions/regex.php';

// Zatwierdzenie termsów. Jeżeli nie jest ustawione, znaczy, że nie jest zaznaczone.

if (!isset($_POST['terms'])) {
  $_SESSION['error'] = "Zatwierdź regulamin!";
  echo "<script>history.back()</script>";
  exit();
}

// Tutaj deklarujemy zmienną $error, która domyślnie ma wartość 0. W ifach sprawdzamy czy hasła oraz maile są tożsame, jeżeli nie, to $error zostaje ustawiony na 1, $_SESSION['error'] zawiera stosowny błąd, a trzeci if sprawdza czy $error jest 1 czy 0, jak 1 (czyli znalazł on błąd), to użytkownik zostaje wywalony ze stosownym błędem na stronę rejestracji.

$error=0;

//Jeżeli hasło1 rózni się od hasła2 wywala error, kolejne działają tak samo.
if ($_POST['password1'] != $_POST['password2']) {
  $_SESSION['error'] = "Hasła są różne!";
  $error=1;
}

if ($_POST['email1'] != $_POST['email2']) {
  $_SESSION['error'] = "Adresy email są różne!";
  $error=1;
}

//Tutaj troszkę inaczej. Jeżeli gender nie równa się 0, albo nie równa się 1, wywalamy bład. Jak wiemy, ustawiliśmy, że mężczyzna to 1, kobieta to 0 (now laugh) więc każda inna opcja, albo NULL czyli puste oznacza, że ktoś coś namieszał w kodzie strony, więc niech spada :)
if($_POST['gender'] != '2' && $_POST['gender'] != '1'){
  $_SESSION['error'] = "Wypełnij prawidłowo płeć";
  $error = 1;
}

//Sprawdzamy imię, reszta idzie tak samo. StringRegex to funckja stworzona przez Hermana w regex.php. Opis regex.php sobie odpuszczam ze względu na to, że to funkcja Hermana, więc jakikolwiek błąd w tłumaczeniu z mojej strony sprawi, że będziecie w ogromnym błędzie, takie drobnostki w programowaniu dużo znaczą, także..
if(stringRegex($_POST['name'])){
  $name = stringRegex($_POST['name']);
} else {
  $error = 1;
}
//Sprawdzamy nazwisko
if(stringRegex($_POST['surname'],'surname')){
  $surname = stringRegex($_POST['surname'],'surname');
} else {
  $error = 1;
}
//Sprawdzamy email
if(stringRegex($_POST['email1'],'email')){
  $email = stringRegex($_POST['email1'],'email');
} else {
  $error = 1;
}
//Sprawdzamy numer
if(stringRegex($_POST['phoneNumber'],'number')){
  $number = stringRegex($_POST['phoneNumber'],'number');
} else {
  $error = 1;
}
//Sprawdzamy hasło
if(stringRegex($_POST['password1'],'password')){
  $pass = stringRegex($_POST['password1'],'password');
} else {
  $error = 1;
}
if ($error==1){
  header('location: ../pages/register.php');
  exit();
}

// Ustawiamy znowu zmienną, tym razem $pass, która przechowuje nasze hasło w ARGON2ID. Tutaj nie ma co tłumaczyć, zmienna password_hash, jak kiedyś jej zapomnicie to sprawdzicie w dokumentacji, nic dodać, nic ująć.
$pass = password_hash($_POST['password1'], PASSWORD_BCRYPT);

if ($_POST['gender']==1) {
  $avatar="avatar5.png";
}
else {
  $avatar="avatar2.png";
}

//wytłumaczone już w register.php w pages.
require_once './connect.php';
$sql = "INSERT INTO `users` (`email`, `number`, `name`, `surname`, `birthday`, `gender`, `password`, `avatar_src`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

//Przesyłamy dane bezpieczną metodą. Jak kogoś to dokładnie interesuje to można wyszukać jak działa bind_param(), lecz myślę, że można równie dobrze na pamięć się nauczyć, często będziemy tego używali, wejdzie w głowę. Łatwiejsza metoda to $connect->query($sql), ale jest to mało bezpieczna opcja. Na pewno szybsza, ale podatna na sql injection
$stmt = $connect->prepare($sql);
$stmt->bind_param("ssssssss", $email, $number, $name, $surname, $_POST['birthday'], $_POST['gender'], $pass, $avatar);

//No i końcowo, jeżeli stmt->execute nie powiedzie się, czyli finalnie skrypt dodający nie doda, to wywalamy błąd, że nie dodano użytkownika. W razie jeżeli stmt->execute się powiedzie, użytkownik zostanie na 100% dodany do bazy, więc mu to pokazujemy.
if ($stmt->execute()) {
  //Randomowo generowany 30 znakowy kod dostępu do aktywacji konta, następnie przesyłamy bind_paramem do bazy.
  $activation_link = bin2hex(random_bytes(15));
  $sql = "INSERT INTO `activation_link` (`created_at`, `link`) VALUES (CURRENT_TIMESTAMP(), '$activation_link')";
  $connect->query($sql);
  // UPDATE `activation_link` INNER JOIN `users` SET `user_id` = users.id WHERE users.email = 'KURWA@gmail.com' AND activation_link.user_id='0';
  $sql1 = "UPDATE `activation_link` INNER JOIN `users` SET `user_id` = users.id WHERE users.email = '$email' AND activation_link.user_id='0';";
  $connect->query($sql1);
  //Tutaj robimy mailera. Mailer pozwoli nam na wysyłanie maili do użytkowników, aby powiadamiać ich o różnych rzeczach czy też do aktywacji konta. Do konfiguracji mailera potrzebujecie zrobić coś więcej niż wklejenie kodu i odpalenie go, więc zamieszczam link, który dostałem od Michała. Autor poradnika tłumaczy bardzo prosto, myślę, że każdy ogarnie ;) Przyda nam się jakiś mail na Gmailu, żebyśmy nie musieli szukać configu pod inne poczty.
  //Link: https://www.thapatechnical.com/2020/03/how-to-send-mail-from-localhost-xampp.html


  $to_email = $email;
  $subject = "Aktywacja konta";
  $body = "Witaj, aby aktywować konto należy przejść na tę stronę http://localhost/teb/10_adminlte/scripts/account_activation.php?activation_link=$activation_link&email=$email";

  if (mail($to_email, $subject, $body)) {
      $_SESSION['error']="Konto utworzone, potwierdź aktywację z maila na poczcie.";

      // $sql="SELECT 'id' FROM `users` WHERE `email`='$email'";
      $sql = "SELECT id FROM `users` WHERE email = '$email';";
      $result=$connect->query($sql);
      $userId=$result->fetch_assoc();

      $sql = "INSERT INTO `userrole` (`user_id`, `role_id`) VALUES ( '$userId[id]' , '$_POST[role]');";
      $connect->query($sql);

  }

  header('location: ../');
}else{
  //Jedyne przez co nie można było dodać użytkownika to albo problem z bazą (to juz info dla nas), albo użytkownik wprowadził istniejącego już maila. W tym wypadku chcę go o tym poinformować.
  $sql="SELECT email FROM `users`";
  $result = $connect->query($sql);
  while ($row = $result->fetch_assoc()) {
    // Jeżeli email z bazy równa się emailowi po regexie (tutaj ważne, bo w innym wypadku duża czy mała litera już zrobi błąd!) to wywali info, że już taki ktoś jest.
    if ($row['email'] = $email) {
      $_SESSION['error'] = "Użytkownik o podanym mailu już istnieje. Zaloguj się, lub przypomnij hasło.";
      header('location: ../pages/register.php');
      exit();
    }
  }
  $_SESSION['error'] = "Nie dodano użytkownika. Skontaktuj się z administratorem strony.";
  header('location: ../pages/register.php');
  exit();
}
?>
