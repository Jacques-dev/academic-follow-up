
  <?php
    include("../Controller/Fonctions.php");
    include("../BDD/Connexion.php");
    render("Header", ["activePage" => "Ranking"]);
    // show($_SESSION["marksv2"]);
    // show($_POST);
    if (!isset($_SESSION["RankingSelectionHistory"])) {
      $_SESSION["RankingSelectionHistory"] = [["École", null, null]];
      $_SESSION["RankingSelectionIndex"] = 0;
    }

    if ($_POST["rankingSelection"]) {
      $rankingSelection = explode("_", $_POST["rankingSelection"]);
      array_push($_SESSION["RankingSelectionHistory"], [$rankingSelection[0], $rankingSelection[1], $rankingSelection[2]]);
      $_SESSION["RankingSelectionIndex"]++;
    } else {
      if (isset($_POST["preSelection"]) && $_SESSION["RankingSelectionHistory"][$_SESSION["RankingSelectionIndex"]-1][0] != null && count($_SESSION["RankingSelectionHistory"]) != 0) {
        $_SESSION["RankingSelectionIndex"]--;
      } elseif (isset($_POST["nextSelection"]) && $_SESSION["RankingSelectionHistory"][$_SESSION["RankingSelectionIndex"]+1][0] != null && count($_SESSION["RankingSelectionHistory"]) != 0) {
        $_SESSION["RankingSelectionIndex"]++;
      }
    }

    $selection = $_SESSION["RankingSelectionHistory"][$_SESSION["RankingSelectionIndex"]][0];
    $id = $_SESSION["RankingSelectionHistory"][$_SESSION["RankingSelectionIndex"]][1];
    $name = $_SESSION["RankingSelectionHistory"][$_SESSION["RankingSelectionIndex"]][2];

    // show($_SESSION["RankingSelectionHistory"]);
    // show($_SESSION["RankingSelectionIndex"]);
    // show("Selection : ".$selection." id : ".$id." name : ".$name);
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 ml-lg-auto mr-lg-auto" align="center" id="head-column" style="background-color: <?= $_SESSION['manager'] ? '#3978c4' : '#63d55f' ?>">
        <?php
          if (isset($_SESSION["email"])):
            echo $_SESSION["email"];
          endif;
        ?>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <form action="" method="post">
          <?php
          $school = $_SESSION["profil"]["school"];
          if ($selection === "Semestre") {
            $table = "UE";
            $elementPrinted = "name";
            $innerJoin = "student_ue";
            $idLink = "semester";
            $whatWeWant = "average";
            $sql = "SELECT id, name FROM ue WHERE id_semester = $id";
          } else if ($selection === "UE") {
            $table = "Matière";
            $elementPrinted = "name";
            $innerJoin = "student_subject";
            $idLink = "ue";
            $whatWeWant = "average";
            $sql = "SELECT id, name FROM subject WHERE id_ue = $id";
          } else if ($selection === "Matière") {
            $table = "Notes";
            $elementPrinted = "type";
            $innerJoin = "student_subject";
            $idLink = "subject";
            $whatWeWant = "average";
            $sql = "SELECT id, type FROM mark WHERE id_subject = $id";
          } else if ($selection === "Notes") {
            $table = "Notes";
            $elementPrinted = "type";
            $innerJoin = "student_marks";
            $idLink = "mark";
            $whatWeWant = "mark";
            $sql = "SELECT id, type FROM mark WHERE id = $id";
          } else {
            $table = "Semestre";
            $elementPrinted = "num";
            $innerJoin = "semester";
            $whatWeWant = "average";
            $sql = "SELECT id, num FROM semester WHERE school = '$school' ORDER BY num + 0 ASC";
          }

          ?>
          <div class="row">
            <?= "Selection : ".$selection." ".$name; ?>
          </div>

          <div class="row">
            <button type="submit" name="preSelection" value=<?= true; ?>><i class="fas fa-arrow-circle-left"></i></button>
            <?php if ($selection != "Notes") {?>
              <button type="submit" name="nextSelection" value=<?= true; ?>><i class="fas fa-arrow-circle-right"></i></button>
            <?php } ?>
          </div>

          <?php
          $result = $con->query($sql);
          while($row = $result->fetch_assoc()) { ?>
            <?php if ($selection != "Notes") { ?>
              <button class="row" type="submit" name="rankingSelection" value=<?= $table."_".$row["id"]."_".$row[$elementPrinted]; ?>><?= $table." ".$row[$elementPrinted]; ?></button>
            <?php }
          } ?>
        </form>

      </div>

      <div class="col-lg-8">
        <?php
        $sql = "SELECT name, firstName, $whatWeWant FROM student s INNER JOIN $innerJoin ss WHERE s.id = ss.id_student AND ss.id_$idLink = $id AND s.confidentiality = 'Publique' ORDER BY $whatWeWant";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()) { ?>
          <div class="">
            <?= $row["name"]." ".$row["firstName"]." : ".$row[$whatWeWant]; ?>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>

  <?php render("Footer", []); ?>
