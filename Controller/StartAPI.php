

<?php

  session_start();

  // foreach (glob("classes/*.php") as $filename) {
  //   include $filename;
  // }


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


  $classes = ["School", "Semester", "Subject", "TDGroup", "UE", "Year", "MarkType"];
  $BDD_tables = ["school", "semesters", "subject", "td_group", "ue", "year", "mark_type"];
  $whatWeWant = ["name", "num", "name", "td_group", "name", "year", "mark_type"];

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

  foreach ($apiv2->getSemesters() as $sem) {
    $array_sem = [$sem->getName(), []];

    foreach ($apiv2->getUE() as $ue) {
      if ($ue->getSemester() === $sem->getName()) {
        array_push($array_sem[1], [$ue->getName(),[]] );

        for ($i = 0; $i != count($apiv2->getSubjects()); $i++) {
          if ($apiv2->getSubjects()[$i]->getUE() === $ue->getName()) {
            array_push($array_sem[1][$i][1], [$apiv2->getSubjects()[$i]->getName(),[]] );
          }
        }
      }
    }
    array_push($apiv3, $array_sem);
  }


  $_SESSION["apiv3"] = $apiv3;











?>
