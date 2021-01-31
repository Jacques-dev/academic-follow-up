
<?php
  include("../BDD/Connexion.php");

  session_start();

  if (isset($_SESSION["cookie"])) {
    $emailCookie = $_SESSION["cookie"][0];
    $passwordCookie = $_SESSION["cookie"][1];
    $timeCookie = $_SESSION["cookie"][2];

    $array = array($emailCookie, $passwordCookie, $timeCookie);
    $values = implode(",", $array);

    setcookie("RememberMe", $values, time() + 60 * 60 * 24 * 365);
    unset($_SESSION["cookie"]);
  }

  if (isset($_SESSION["cookiechecked"]) && $_SESSION["cookiechecked"] === false) {
    header('Location: ../Controller/CheckCookie.php');
  }

  if (isset($_SESSION["logout"])) {
    unset($_COOKIE["RememberMe"]);
    setcookie("RememberMe", "", time() - 3600);
    unset($_SESSION["logout"]);
  }

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Academix Follow-Up</title>
    <!-- Font family -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Andika+New+Basic&display=swap" rel="stylesheet">

    <!-- icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Popup CSS -->
    <link href="https://cdn.isfidev.net/asalertmessage/v1.0/css/as-alert-message.min.css" rel="stylesheet">
    <script src="https://cdn.isfidev.net/asalertmessage/v1.0/js/as-alert-message.min.js"></script>
    <link rel="stylesheet" href="/academic-follow-up/Vue/CSS/Main.css">
    <link rel="stylesheet" href="/academic-follow-up/Vue/CSS/Average.css">

    </head>
    <body>

      <?php
      if (isset($_SESSION["popupResult"])) {
        $type = $_SESSION["popupResult"]["type"];
        $title = $_SESSION["popupResult"]["title"];
        $message = $_SESSION["popupResult"]["message"];
        $time = isset($_SESSION["popupResult"]["time"]) ? $_SESSION["popupResult"]["time"] : 2000;
        ?>
        <script type="text/javascript">
          asAlertMsg({
            type: "<?= $type ?>",
            title: "<?= $title ?>",
            message: "<?= $message ?>",
            timer: <?= $time ?>
          })
          setTimeout(function() {
            <?php unset($_SESSION["popupResult"]); ?>
          }, 2000);
        </script>
      <?php } ?>

      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <img class="nav-link" src="/academic-follow-up/Vue/IMAGES/logo1.png" id="logo1">
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $activePage === 'Home' ? 'active' : '' ?>" href="/academic-follow-up/Home.php">Home</a>
            </li>
            <?php if(isset($_SESSION["email"])): ?>
            <li class="nav-item">
              <a class="nav-link <?= $activePage === 'Average' ? 'active' : '' ?>" href="/academic-follow-up/Vue/Averages.php">Mes notes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $activePage === 'Ranking' ? 'active' : '' ?>" href="/academic-follow-up/Vue/Ranking.php">Mon classement</a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="mx-auto order-0">
          <div class="navbar-brand mx-auto">
            My Academic Follow-Up<br>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION["email"])): ?>
              <li class="nav-item">
                <a class="nav-link" href="/academic-follow-up/Vue/Profil.php">Mon profil</a>
              </li>
            <?php endif; ?>
            <?php include("LoginForm.php"); ?>
            <?php include("RegisterForm.php"); ?>
          </ul>
        </div>
      </nav>
