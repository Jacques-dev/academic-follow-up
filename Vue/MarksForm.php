

<?php
  include("../BDD/Connexion.php");
  $idProfil = $_SESSION["profil"]["id"];

  $SemesterSelection = explode("_", $_POST["SemesterSelection"]);
  $_SESSION["MarkSelectionHistory"] = [$SemesterSelection[0], $SemesterSelection[1], $SemesterSelection[2]];

  $selection = $_SESSION["MarkSelectionHistory"][0];
  $id = $_SESSION["MarkSelectionHistory"][1];
  $name = $_SESSION["MarkSelectionHistory"][2];
  // show($_POST);
  // show($selection);
  // show($id);
  // show($name);
  // show($_SESSION["marksv4"]);
?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2">
        <form action="" method="post" class="formRanking" style="position: fixed;">
          <?php
            $school = $_SESSION["profil"]["school"];
            $sql = "SELECT id, num FROM semester WHERE school = '$school' ORDER BY num + 0 ASC"; ?>

            <div class="row">
              <?php if ($selection === "Semester"): ?>
              <?= "Selection : ".$selection." ".$name; ?>
            <?php endif; ?>
            </div>

            <?php $result = $con->query($sql);
            while($row = $result->fetch_assoc()) { ?>
              <?php if ($selection != "Notes") { ?>
                <button class="row raise" type="submit" name="SemesterSelection" value=<?= "Semester_".$row["id"]."_".$row["num"]; ?>>
                  <?= "Semester ".$row["num"] ?>
                </button>
              <?php }
            } ?>
        </form>
      </div>

      <div class="col-lg-10">
        <form action="../Controller/MarksManagement.php" method="post" class="formContainer">
          <button class="learn-more btn-1" type="submit" name="button">
            <span class="circle" aria-hidden="true">
              <span class="icon arrow"></span>
            </span>
            <span class="button-text">Enregistrer</span>
          </button>

          <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$name - 1][2]) ; $j++) {?>
            <div class="row">
              &nbsp;&nbsp;&nbsp;&nbsp;
              <p>UE --- <?= $_SESSION["apiv3"][$name - 1][2][$j][1]; ?></p>
            </div>

            <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$name - 1][2][$j][2]) ; $k++ ) { ?>
              <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p>Matiere --- <?= $_SESSION["apiv3"][$name - 1][2][$j][2][$k][1]; ?></p>
              </div>

                <?php for($l = 0 ; $l < count($_SESSION["apiv3"][$name - 1][2][$j][2][$k][2]) ; $l++ ) { ?>
                  <div class="row">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p>
                      Note ---
                      <?php
                      $markStudent = $_SESSION["profil"]["id"];
                      $markSemester = $_SESSION["apiv3"][$name - 1][0];
                      $markUE = $_SESSION["apiv3"][$name - 1][2][$j][0];
                      $markSubject = $_SESSION["apiv3"][$name - 1][2][$j][2][$k][0];
                      $markId = $_SESSION["apiv3"][$name - 1][2][$j][2][$k][2][$l][0];

                      $mark = $markStudent."_".$markSemester."_".$markUE."_".$markSubject."_".$markId; ?>
                      <?= $_SESSION["apiv3"][$name - 1][2][$j][2][$k][2][$l][1]; ?>
                      <?php if (isset($_SESSION["marksv4"][$name - 1][2][$j][2][$k][2][$l][0])) { ?>
                        <div class="form__group field">
                          <input type="input" class="form__field" name=<?= $mark; ?> id=<?= $mark; ?> value=<?= $_SESSION["marksv4"][$name - 1][2][$j][2][$k][2][$l]; ?> />
                          <label for=<?= $mark; ?> class="form__label"></label>
                        </div>
                        /20
                      <?php } else { ?>
                        <div class="form__group field">
                          <input type="input" class="form__field" placeholder="entrez votre note" name=<?= $mark; ?> id=<?= $mark; ?> />
                          <label for=<?= $mark; ?> class="form__label"></label>
                        </div>
                        /20
                      <?php } ?>
                      <?php
                      // show(" --student id : ");
                      // show($markStudent);
                      // show(" --semester id : ");
                      // show($markSemester);
                      // show(" -- ue id : ");
                      // show($markUE);
                      // show(" -- subject id : ");
                      // show($markSubject);
                      // show(" -- mark id : ");
                      // show($markId);
                      ?>
                    </p>
                  </div>

                <?php
              }
            }
          }
          ?>
        </form>
      </div>

    </div>
  </div>
