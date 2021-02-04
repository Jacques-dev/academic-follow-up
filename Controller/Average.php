

<?php

  include("../BDD/Connexion.php");
  include('Fonctions.php');
  session_start();

  // show($_POST);

  $index = 0;
  foreach ($_POST as $mark => $markValue) {
    if ($index != 0) {
      $markContent = explode("_", $mark);
      $markId = $markContent[1];
      $markSubject = $markContent[2];
      $markStudent = $markContent[3];
      // show($markContent);
      show("mark id = ".$markId." mark subectId = ".$markSubject." mark value = ".$markValue." student = ".$markStudent);
    }
    $index++;
  }


?>
