<?php

  session_start();

  function find ($table, $class) {
    include("../BDD/Connexion.php");

    $include = "../Model/".$class.".php";
    include($include);

    $sql = "SELECT * FROM $table";

    $result = $con->query($sql);

    if ($result->num_rows != 0) {

      $res = [];
      while ($object = $result->fetch_object($class)) {
        array_push($res, $object);
      }

      return $res;
    } else {
      header('Location: ../Vue/404.php');
    }
  }

  function getWhatWeWant($table, $whatWeWant) {
    $res = [];
    foreach($table as $elt) {
      array_push($res, $elt->getName());
    }

    return $res;
  }

  $classes    = ["School", "Semester", "Subject", "TDGroup",  "UE",   "Promotion", "MarkType"];
  $BDD_tables = ["school", "semester", "subject", "td_group", "ue",   "promotion", "mark_type"];
  $whatWeWant = ["name",   "num",      "name",    "name",     "name", "year",      "name"];

  include("../Model/API.php");
  $api = new API();
  $apiv2 = new API();

  for ($i = 0; $i != count($classes); $i++) {
    $find = find($BDD_tables[$i], $classes[$i]);
    $res = [$find, $BDD_tables[$i]];
    $array = getWhatWeWant($res[0], $whatWeWant[$i]);
    $api->setAttribute($array, $res[1]);
    $apiv2->setAttribute($find, $res[1]);
  }

  $_SESSION["api"] = $api;
  $_SESSION["apiv2"] = $apiv2;

  $apiv3 = [];

  for ($a = 0 ; $a < count($apiv2->getSemester()) ; $a++) {

    $le_semestre = $apiv2->getSemester()[$a];
    $un_semestre = [$le_semestre->getName(), []];

    for ($b = 0 ; $b < count($apiv2->getUE()); $b++) {

      $l_ue = $apiv2->getUE()[$b];
      $une_ue = [$l_ue->getName(), []];

      if ($l_ue->getSemester() === $le_semestre->getName()) {
        array_push($un_semestre[1], $une_ue );

        for ($i = 0; $i != count($apiv2->getSubjects()); $i++) {
          $la_matiere = $apiv2->getSubjects()[$i];
          $une_matiere = [$la_matiere->getName(), []];

          if ($la_matiere->getUE() === $l_ue->getId()) {
            array_push($un_semestre[1][$b][1], $une_matiere );
          }
        }
      }
    }
    array_push($apiv3, $un_semestre);
  }

  $_SESSION["apiv3"] = $apiv3;

?>
