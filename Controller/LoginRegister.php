
<?php

  session_start();

  include("../BDD/Connexion.php");

  include('Fonctions.php');

  if (isset($_POST["submitConnexion"])) {

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

      if (check_email_address($_POST['email'])) {

        $email = $_POST['email'];
        $sql = "SELECT password FROM user WHERE email = '$email'";

        $result = $con->query($sql);

        $row = $result->fetch_assoc();

        if ($result->num_rows == 1) {

          $decrypted_txt = encrypt_decrypt('decrypt', $row['password']);

          if ($decrypted_txt == $_POST['password']) {

            $_SESSION["email"] = $email;

            $popupResult = array("type" => "success", "title" => "Validé", "message" => "Bon retour", "time" => 1000);

            if (isset($_POST["remember"])) {
              $time = time()*60*60*24*365;  //STOCKS 1 YEAR IN THE VAR
              $_SESSION["cookie"] = array($email, $row['password'], $time);
            }

          } else {
            $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Mot de passe incorrect.");
          }

        } else {
          $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Cette adresse mail n'existe pas.");
        }

      } else {
       $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Cette adresse mail n'est pas valide.");
     }

    } else {
      $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Veuillez remplir tous les champs.");
    }

  }

  if (isset($_POST['submitRegister'])) {

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

      if (check_email_address($_POST["email"])) {

        $email = $_POST['email'];

        $sql = $con->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
        $sql->bind_param('ss', $email, $password);

        $sqlTest = "SELECT * FROM user WHERE email = '".$email."'";
        $result = $con->query($sqlTest);

        if ($result->num_rows == 0) {

          $email = $_POST['email'];
          $password = encrypt_decrypt('encrypt', $_POST['password']);

          $sql->execute();

          $popupResult = array("type" => "success", "title" => "Validé", "message" => "Ça y est, c'est partie", "time" => 1000);
        } else {
          $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Ce compte existe déjà.");
        }

      } else {
        $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Cette adresse mail n'est pas valide.");
      }

    } else {
      $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Veuillez entrer un email et un mot de passe.");
    }
  }

  if (isset($_POST['logout'])) {
    if (isset($_SESSION["email"])) {
      session_destroy();
      session_start();
      $_SESSION["logout"] = true;
      $popupResult = array("type" => "success", "title" => "Validé", "message" => "À plus tard !", "time" => 1000);
    }
  }

  $_SESSION["popupResult"] = $popupResult;
  header('Location: /academic-follow-up/Vue/Body?page=Home');
  exit();
?>
