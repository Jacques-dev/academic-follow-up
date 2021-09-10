

<?php

  include("../BDD/Connexion.php");
  include('Fonctions.php');
  session_start();

  // show($_POST);

  if (isset($_POST["insertSemester"])) {
    $sql = "SELECT * FROM semester WHERE email = '$email' AND num = '$num'";
    $result = $con->query($sql);

    if ($result->num_rows == 0){
      $sql = $con->prepare("INSERT INTO semester (num, email) VALUES (?, ?)");
      $sql->bind_param('is', $num, $email);

      $num = $_POST["num"];
      $email = $_SESSION["email"];

      $sql->execute();
      $popupResult = array("type" => "success", "title" => "Validé", "message" => "Nouveau semestre enregistré.", "time" => 500);
    }

  }

  if (isset($_POST["insertUE"])) {
    $sql = "SELECT * FROM ue WHERE email = '$email' AND name = '$name'";
    $result = $con->query($sql2);

    if ($result->num_rows == 0){
      $sql = $con->prepare("INSERT INTO ue (name, coef, semester, email) VALUES (?, ?, ?, ?)");
      $sql->bind_param('sdis', $name, $coef, $semester, $email);

      $name = $_POST["name"];
      $coef = $_POST["coef"];
      $semester = $_POST["semester"];
      $email = $_SESSION["email"];

      $sql->execute();
      $popupResult = array("type" => "success", "title" => "Validé", "message" => "Nouveau semestre enregistré.", "time" => 500);
    }

  }

  if (isset($_POST["insertSubject"])) {
    $sql = "SELECT * FROM subject WHERE email = '$email' AND name = '$name'";
    $result = $con->query($sql);

    if ($result->num_rows == 0){
      $sql = $con->prepare("INSERT INTO subject (name, coef, ue, email) VALUES (?, ?, ?, ?)");
      $sql->bind_param('sdis', $name, $coef, $ue, $email);

      $name = $_POST["name"];
      $coef = $_POST["coef"];
      $ue = $_POST["ue"];
      $email = $_SESSION["email"];

      $sql->execute();
      $popupResult = array("type" => "success", "title" => "Validé", "message" => "Nouveau semestre enregistré.", "time" => 500);
    }
  }

  if (isset($_POST["insertMark"])) {
    $sql = $con->prepare("INSERT INTO mark (mark, coef, type, subject, email) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param('sdsis', $mark, $coef, $type, $subject, $email);

    $mark = $_POST["mark"];
    $coef = $_POST["coef"];
    $type = $_POST["type"];
    $subject = $_POST["subject"];
    $email = $_SESSION["email"];

    $sql->execute();
    $popupResult = array("type" => "success", "title" => "Validé", "message" => "Nouveau semestre enregistré.", "time" => 500);
  }


  $_SESSION["popupResult"] = $popupResult;
  header('Location: /academic-follow-up/Vue/Body?page=Home');
  exit();

?>
