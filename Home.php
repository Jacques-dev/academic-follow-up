
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

    <div class="container">

    </div>

    <script src="Controller/js/app.js"></script>

  </body>
</htm>
