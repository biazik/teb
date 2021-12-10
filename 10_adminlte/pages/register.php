<!-- Całość skryptu będzie dokładnie opisana, tak aby móc się w tym połapać. Mam nadzieję, że pomogę zrozumieć coniektórym jak działa ten php, good luck. -->
<!DOCTYPE html>
<?php
session_start();
 ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rejestracja użytkownika</title>
<!-- Linkowanie CSS  -->
<!-- CSS służy do zmiany różnych kolorów itd, my tego nie przerabiamy, więc dodajemy biblioteki css, które stworzyli twórcy AdminLTE. CSS można napisać od razu, używając <style></style>, można go dodać w jakiejś komendzie np. <h1 style=color:red> czyli nagłówek będzie koloru czerwonego albo można właśnie podpiąć plik z rozszerzeniem .css, który ma już wpisane jak ma się zachowywać na róznych elementach. Polecam właśnie robić to w ten ostatni sposób, zmniejsza to objętość kodu, kod jest bardziej przejrzysty jeżeli rozbijemy go na bloki/inne podstrony. -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- /Linkowanie CSS -->
  </head>
  <br><br>
  <!-- Te wszystkie body, divy, które mają klasy czy id(czyli class= albo id=) po prostu je mają, bo plik css już to wszystko bardzo dobrze ustawił. Dodaje to dużo tekstu, można się gdzieś zgubić, ale to można pominąć, daje nam to tak na prawdę tylko wygląd strony. -->

  <!-- Komunikat z błędem. Po wejściu na strone sprawdzamy czy jest jakiś error, jak jest, to go wyświetlamy. W heredocu są wpisane właśnie takie karty, które to ładnie wyświetlają nad całym formularzem rejestracji -->
  <?php
  if (isset($_SESSION['error'])) {
    echo <<< error


    <div style=width:360px class='alert alert-info alert-dismissible'>
    <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
    <h5><i class='icon fas fa-info'></i> Informacja!</h5>
    $_SESSION[error]
    </div>

    error;
    unset($_SESSION['error']);
  }
  ?>

<body class="hold-transition register-page">
<div class="register-box">

  <div class="card card-outline card-primary">
    <div class="card-header text-center">

      <a href="../../index2.html" class="h1"><b>Rejestracja</b></a>

    </div>

    <div class="card-body">
      <p class="login-box-msg">Zarejestruj nowego użytkownika</p>
<!-- W ramach oczyszczenia kodu, trochę przejrzyściej będzie, więc wszystko pozaznaczam komentarzami -->
<!-- Rozpoczęcie formularza komendą form. action mówi, gdzie przekazujemy formularz, method jaką metodą. Są dwie metody POST, który przesyła 'tajnym skryptem', oraz GET, który przesyła w adresie strony. -->

<!-- Możecie usunąć value z moimi danymi, one są do tego, żeby szybciej wprowadzać te konta, bo można się pociąć przy testowaniu -->
<!-- A i jak nie wiecie dlaczego na przykład jest name czy placeholder to po prostu wpiszcie HTML Input i na W3Schools jest to w sumie dobrze opisane, tak, żeby każdy się połapał. name akurat wyjaśnię, jest on po to, by został on przesłany tym $_POST. W innym wypadku $_POST nie weźmie tej części formularza pod uwagę. -->
      <form action="../scripts/register.php" method="POST">
        <!-- Imię -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='name' value="Patryk" placeholder="Imię">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <!-- Nazwisko -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='surname' value="Biazik" placeholder="Nazwisko">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <!-- Numer telefonu -->
        <!-- Do numeru dodałem ID, bo na dole strony mam skrypt jQuery, który dodaje maskę numeru telefonu -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='phoneNumber' id="phoneNumber" value="665276944" placeholder="+48 ___-___-___">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <!-- Miasta -->
        <div class="input-group mb-3">
            <select class="custom-select" name='city_id'>
              <?php
              // Zaczynają się skrypty XD Require_once injectuje skrypt jeden raz, ten skrypt jest akurat na połączenie z bazą danych, tak, aby nie pisać za każdym razem tych paru linijek. zmienna sql zawiera po prostu komendę, którą wyślemy do bazy, czyli w tym wypadku pobierz wszystkie dane z tabeli cities. result to po prostu przesłanie tej komendy, czyli zmienna connect pobrana ze skryptu z require_once przesyła query czyli zapytanie zawarte w zmeinnej sql. Następnie pętla while, polecam poczytać pętle jak ktoś nie ogarnia, przydatna rzecz. deklarujemy zmienną city i dopóki fetch_assoc czyli komenda wyciągająca nam jeden rekord z bazy nadal wyciąga te rekordy, to skrypt się wykonuje. W skrypcie po prostu wprowadzamy z bazy miasta, tutaj przyda się poznanie jak działa komenda option, a wpisujemy je właśnie dzięki temu, że zadeklarowaliśmy zmienną $city, więc możemy wstawić np $city[city_id], co pobierze nam z bazy 1 rekord city_id, czyli np. 1. Pętla while sprawdzi czy jeszcze
              // raz można wykonać skrypt, jeżeli tak to leci następny rekord, więc mamy city_id = 2 itd.
              require_once("../scripts/connect.php");
              $sql = "SELECT * FROM `cities`";
              $result = $connect->query($sql);
              while ($city = $result->fetch_assoc()) {
              echo "<option value='$city[city_id]'> $city[city] </option>";
              }
               ?>
            </select>

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-city"></span>
          </div>
          </div>

        </div>
        <!-- Email -->
        <div class="input-group mb-3">
          <input type="email" class="form-control" name='email1' value="prowincjapatryk@gmail.com" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <!-- Powtórz Email -->
        <div class="input-group mb-3">
          <input type="email" class="form-control" name='email2' value="prowincjapatryk@gmail.com" placeholder="Powtórz Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <!-- Hasło -->
        <div class="input-group mb-3">
          <input type="password" name='password1' class="form-control" value="kochaćPieski123" placeholder="Hasło">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Powtórz Hasło -->
        <div class="input-group mb-3">
          <input type="password" name='password2' class="form-control" value="kochaćPieski123" placeholder="Powtórz hasło">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Data urodzenia -->
        <div class="input-group mb-3">
          <input type="date" name='birthday' value="2000-12-28" class="form-control">
          <div class="input-group-append">
            <div class="input-group-text">
              <!-- Span to taki paragraf, coś jak <p> tylko pewnie jest on jakoś wystylizowany w CSS, więc wolę użyć spana i mieć ładnie ułożony tekst -->
              <span>Data urodzenia</span>
            </div>
          </div>
        </div>
        <!-- Plec -->
        <!-- W input type radio ważne jest, aby name był taki sam w każdej z opcji, którą chcemy sprawdzić. W innym wypadku będzie można zaznaczyć więcej niż jedno pole, a nie o to nam chodzi. Do zaznaczania więcej niż jednego pola mamy checkbox. -->
        <div class="form-group">
          <div class="row">
            <div class="col-lg-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <input type="radio" value="1" id="customRadio1" name="gender" checked>
                  </span>
                </div>
                <label for="customRadio1" class="form-control">Mężczyzna</label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <input type="radio" value="2" id="customRadio2" name="gender">
                  </span>
                </div>
                <label for="customRadio2" class="form-control">Kobieta</label>
              </div>
            </div>
          </div>
          <br>
        <!-- Akceptacja termsów -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" checked>
              <label for="agreeTerms">
               Akceptuję <a href="#">regulamin</a>
              </label>
            </div>
          </div>
          <!-- Przycisk rejestracji -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="width:105%;">Zarejestruj</button>
          </div>
        </div>
      </form>

<!-- Logowanie google i facebook, może Pan będize kiedyś chciał to zrobić, więc zostawiam -->
      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="../index.php" class="text-center">Już posiadam konto</a>
    </div>
  </div>
</div>

<!-- Tutaj są dodawane różne dodatkowe biblioteki komend JavaScript, które pewnie gdzieś w kodzie są użyte, więc lepiej tego nie usuwać xDD -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Dodana przeze mnie biblioteka jQuery, żeby inputmaska na nr telefonu zrobić -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script type="text/javascript">
  $('#phoneNumber').inputmask("+48 999-999-999");
</script>

</body>
</html>
