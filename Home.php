
<?php
  include("BDD/Connexion.php");

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
    header('Location: Controller/CheckCookie.php');
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

    <?php include("Vue/Header.php"); ?>
    <!-- Main css -->
    <link rel="stylesheet" href="Vue/CSS/Main.css">

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
            <img class="nav-link" src="Vue/IMAGES/logo1.png" id="logo1">
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Home.php">Home</a>
          </li>
          <?php if(isset($_SESSION["email"])): ?>
          <li class="nav-item">
            <a class="nav-link" href="Vue/Averages.php">Mes notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Vue/Ranking.php">Mes classements</a>
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
              <a class="nav-link" href="Vue/Profil.php">Mon profil</a>
            </li>
          <?php endif; ?>
          <?php include("Vue/LoginForm.php"); ?>
          <?php include("Vue/RegisterForm.php"); ?>
        </ul>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-lg-12" align="center" id="head-column">
          <?php
            if (isset($_SESSION["email"])):
              echo $_SESSION["email"];
            endif;
          ?>
        </div>
      </div>

    
      <!-- <div class="row">
        <form action="index.html" method="post">

        </form>
      </div> -->


    </div>

    <script src="Controller/js/app.js"></script>

  </body>
</htm>
