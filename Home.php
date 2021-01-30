
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

  include("Vue/LoginForm.php");
  include("Vue/RegisterForm.php");

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Home.php">MAFU</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="Home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Vue/Averages.php">Mes moyennes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Vue/Ranking.php">Mon classement</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
        </ul>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-lg-12" align="center" id="head-column">
          My Academic Follow-Up<br>
          <?php
            if (isset($_SESSION["email"])):
              echo $_SESSION["email"];
            endif;
          ?>
        </div>
      </div>
    </div>

    <script src="Controller/js/app.js"></script>

  </body>
</htm>
