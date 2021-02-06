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

  $classes    = ["School", "Semester", "Subject", "TDGroup",  "UE",   "Promotion", "MarkType",  "Mark"];
  $BDD_tables = ["school", "semester", "subject", "td_group", "ue",   "promotion", "mark_type", "mark"];
  $whatWeWant = ["name",   "num",      "name",    "name",     "name", "year",      "name",      "type"];

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

  // show($apiv2);
  $apiv3 = [];

  for ($a = 0 ; $a < $apiv2->getSemesterFromSchool($_SESSION["profil"]["school"]) ; $a++) {

    $le_semestre = $apiv2->getSemester()[$a];
    $un_semestre = [$le_semestre->getId(), $le_semestre->getName(), []];

    for ($b = 0 ; $b < count($apiv2->getUE()); $b++) {

      $l_ue = $apiv2->getUE()[$b];
      $une_ue = [$l_ue->getId(), $l_ue->getName(), [], $l_ue->getCoefficient()];
      $o = 0;

      if ($l_ue->getSemester() === $le_semestre->getId()) {
        array_push($un_semestre[2], $une_ue);

        for ($i = 0; $i != count($apiv2->getSubjects()); $i++) {

          $la_matiere = $apiv2->getSubjects()[$i];
          $une_matiere = [$la_matiere->getId(), $la_matiere->getName(), [], $la_matiere->getCoefficient()];

          if ($la_matiere->getUE() === $l_ue->getId()) {
            array_push($un_semestre[2][$b][2], $une_matiere);

            for ($j = 0; $j < count($apiv2->getMark()); $j++) {

              $la_note = $apiv2->getMark()[$j];
              $une_note = [$la_note->getId(), $la_note->getType(), $la_note->getCoefficient()];
              if ((int)$la_note->getSubject() === (int)$la_matiere->getId()) {
                array_push($un_semestre[2][$b][2][$o][2], $une_note);
              }
            }
            $o++;
          }
        }
      }
    }
    array_push($apiv3, $un_semestre);
  }

  $_SESSION["api"] = $api;
  $_SESSION["apiv2"] = $apiv2;
  $_SESSION["apiv3"] = $apiv3;

?>
