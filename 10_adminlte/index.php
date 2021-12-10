<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logowanie</title>

  <!-- Linkowanie CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- /Linkowanie CSS -->
</head>
<body class="hold-transition login-page">
  <?php
  if (isset($_SESSION['error'])) {
    echo <<< error


    <div style=width:360px class='alert alert-info alert-dismissible'>
    <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
    <h5><i class='icon fas fa-info'></i> Informacja </h5>
    $_SESSION[error]
    </div>

    error;
    unset($_SESSION['error']);
  }
  ?>
  <!-- Values z formularza można usunąć, dodałem je, żeby łatwiej logować userów -->
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Logowanie</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Zaloguj się, aby rozpocząć sesję</p>
      <!-- Rozpoczęcie formularza -->
      <form action="./scripts/login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="prowincjapatryk@gmail.com">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Hasło" name="password" value="kochaćPieski123">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Zaloguj i zapamiętaj mnie -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Zapamiętaj mnie
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
          </div>
        </div>
      </form>

      <!-- Logowanie przez google i facebooka, zostawiam, w razie gdybysmy to kiedys chcieli robic -->
      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Zaloguj przez Facebooka
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Zaloguj przez Google+
        </a>
      </div> -->

      <!-- Zapomniałem hasła i rejestracja -->

      <p class="mb-1">
        <a href="pages/forgot-password.php">Zapomniałem hasła</a>
      </p>
      <p class="mb-0">
        <a href="pages/register.php" class="text-center">Zarejestruj się jako nowy użytkownik</a>
      </p>
    </div>
  </div>
</div>

<!-- Biblioteki dodatkowe, lepiej tego nie usuwać, żeby strona nadal działała, bo pewnie strona korzysta z tych bibliotek -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
