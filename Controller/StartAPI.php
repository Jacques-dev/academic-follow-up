

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

?>
