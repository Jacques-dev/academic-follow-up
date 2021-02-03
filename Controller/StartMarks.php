


<?php
  session_start();
  include("../BDD/Connexion.php");

  $markToAdd = ["semester", "ue", "subject", "marks"];

  $marks = [];
  for ($i = 0 ; $i != count($markToAdd) ; $i++) {
    $pile = [];

    if ($markToAdd[$i] != "marks") {
      $sql = "SELECT sx.average FROM student s INNER JOIN student_$markToAdd[$i] sx WHERE s.id = sx.id_student AND s.id = $idProfil";
    } else {
      $sql = "SELECT sx.mark, sx.type, sx.coefficient, sx.id_subject FROM student s INNER JOIN student_$markToAdd[$i] sx WHERE s.id = sx.id_student AND s.id = $idProfil";
    }

    $result = $con->query($sql);

    while ($row = $result->fetch_assoc()) {
      array_push($pile, $row);
    }

    $marks[$markToAdd[$i]] =  $pile;
  }



  $marksv2 = [];
  for ($i = 0 ; $i != count($markToAdd) ; $i++) {
    $pile = [];

    if ($markToAdd[$i] != "marks") {
      $sql = "SELECT sx.* FROM student s INNER JOIN student_$markToAdd[$i] sx WHERE s.id = sx.id_student AND s.id = $idProfil";
    } else {
      $sql = "SELECT sx.mark, sx.type, sx.coefficient, sx.id_subject FROM student s INNER JOIN student_$markToAdd[$i] sx WHERE s.id = sx.id_student AND s.id = $idProfil";
    }

    $result = $con->query($sql);

    while ($row = $result->fetch_assoc()) {
      array_push($pile, $row);
    }

    $marksv2[$markToAdd[$i]] =  $pile;
  }

  // show($marksv2);

  $marksv3 = [];

  for ($a = 0 ; $a != count($marksv2["semester"]) ; $a++) {

    $le_semestre = $marksv2["semester"][$a];
    $un_semestre = [$le_semestre["id_semester"], $le_semestre["average"], []];

    for ($b = 0 ; $b != count($marksv2["ue"]); $b++) {

      $l_ue = $marksv2["ue"][$b];
      $une_ue = [$l_ue["id_ue"], $l_ue["average"], []];
      $o = 0;

      if ($l_ue["id_semester"] === $le_semestre["id_semester"]) {
        array_push($un_semestre[2], $une_ue);

        for ($i = 0; $i != count($marksv2["subject"]); $i++) {

          $la_matiere = $marksv2["subject"][$i];
          $une_matiere = [$la_matiere["id_subject"], $la_matiere["average"]];

          if ($la_matiere["id_ue"] === $l_ue["id_ue"]) {
            array_push($un_semestre[2][$b][2], $une_matiere);

            for ($j = 0; $j != count($marksv2["marks"]); $j++) {

              $la_note = $marksv2["marks"][$j];
              $une_note = [$la_note["type"], $la_note["mark"], $la_note["coefficient"]];

              if ($la_note["id_subject"] === $la_matiere["id_subject"]) {
                array_push($un_semestre[2][$b][2][$o], $une_note);

              }

            }

            $o++;

          }

        }

      }


    }
    array_push($marksv3, $un_semestre);
  }

  $_SESSION["marks"] = $marks;
  $_SESSION["marksv2"] = $marksv2;
  $_SESSION["marksv3"] = $marksv3;
?>
