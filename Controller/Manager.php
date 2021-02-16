

<?php

  include("../BDD/Connexion.php");
  include('Fonctions.php');
  session_start();

  show($_POST);


  if (isset($_POST["deleteSemester"])) {
    $id = $_POST["deleteSemester"];
    $school = $_SESSION["profil"]["school"];

    $sql = "DELETE FROM semester WHERE id = $id AND school = '$school'";
    $con->query($sql);

    $sql = "SELECT * FROM semester WHERE school = '$school'";
    $result = $con->query($sql);
    $nb = $result->num_rows;

    $sql = "UPDATE school SET nb_semester = $nb WHERE name = '$school'";
    $con->query($sql);

    $popupResult = array("type" => "success", "title" => "Validé", "message" => "Suppression enregistré.", "time" => 1000);
  }

  if (isset($_POST["insertSemester"])) {
    $sql = $con->prepare("INSERT INTO semester (num, school) VALUES (?, ?)");
    $sql->bind_param('ss', $num, $school);

    $num = $_POST["insertSemester"];
    $school = $_SESSION["profil"]["school"];

    $sql->execute();

    $sql = "SELECT * FROM semester WHERE school = '$school'";
    $result = $con->query($sql);
    $nb = $result->num_rows;

    $sql = "UPDATE school SET nb_semester = $nb WHERE name = '$school'";
    $con->query($sql);

    $popupResult = array("type" => "success", "title" => "Validé", "message" => "Nouveau semestre enregistré.", "time" => 1000);
  }

  if (isset($_POST["submitManagerEditing"])) {
    $school = $_SESSION["profil"]["school"];
    foreach ($_POST as $res => $editValue) {

      if ($editValue != "" && $editValue != null) {
        $editContent = explode("_", $res);
        $type = $editContent[0];
        $id = $editContent[1];
        $attribut = $editContent[2];


        if ($type === "semester") {
          $sql = "UPDATE semester SET num = $editValue WHERE id = $id";
          $con->query($sql);
        }

        if ($type === "ue") {
          if ($attribut === "name") {
            $sql = "UPDATE ue SET name = '$editValue' WHERE id = $id";
          } elseif ($attribut === "coef") {
            $sql = "UPDATE ue SET coefficient = $editValue WHERE id = $id";
          }
          $con->query($sql);
        }

        if ($type === "subject") {
          if ($attribut === "name") {
            $sql = "UPDATE subject SET name = '$editValue' WHERE id = $id";
          } elseif ($attribut === "coef") {
            $sql = "UPDATE subject SET coefficient = $editValue WHERE id = $id";
          }
          $con->query($sql);
        }

        if ($type === "mark") {
          if ($attribut === "type") {
            $sql = "UPDATE mark SET type = $editValue WHERE id = $id";
          } elseif ($attribut === "coef") {
            $sql = "UPDATE mark SET coefficient = $editValue WHERE id = $id";
          }
          $con->query($sql);
        }

      }
    }

  }


  $_SESSION["popupResult"] = $popupResult;
  header('Location: /academic-follow-up/Vue/Management.php');
  exit();

?>
