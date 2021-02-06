

  <?php
    include("../Controller/Fonctions.php");
    render("Header", ["activePage" => "MarksForm"]);
    include("../Controller/StartMarks.php");
    // show($_SESSION["profil"]["school"]);
    // show($_SESSION["apiv2"]);
    // show($_SESSION["apiv3"]);
    // show($_SESSION["marksv3"]);
    // show($_SESSION["marksv4"]);
  ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12" align="center" id="head-column" style="background-color: <?= $_SESSION['manager'] ? '#3978c4' : '#63d55f' ?>">
          <?php
            if (isset($_SESSION["email"])):
              echo $_SESSION["email"];
            endif;
          ?>
        </div>
      </div>

      <form action="../Controller/MarksManagement.php" method="post">
        <button type="submit" name="button">Enregistrer</button>
        <?php

          for($i = 0 ; $i < $_SESSION["apiv2"]->getSemesterFromSchool($_SESSION["profil"]["school"]) ; $i++) {?>
            <div class="row">
              <p>Semestre <?= $_SESSION["apiv3"][$i][1]; ?></p>
            </div>

            <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][2]) ; $j++) {?>
              <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <p>UE --- <?= $_SESSION["apiv3"][$i][2][$j][1]; ?></p>
              </div>

              <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][2][$j][2]) ; $k++ ) { ?>
                <div class="row">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <p>Matiere --- <?= $_SESSION["apiv3"][$i][2][$j][2][$k][1]; ?></p>
                </div>

                  <?php for($l = 0 ; $l < count($_SESSION["apiv3"][$i][2][$j][2][$k][2]) ; $l++ ) { ?>
                    <div class="row">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <p>
                        Note ---
                        <?php
                        $markStudent = $_SESSION["profil"]["id"];
                        $markSemester = $_SESSION["apiv3"][$i][0];
                        $markUE = $_SESSION["apiv3"][$i][2][$j][0];
                        $markSubject = $_SESSION["apiv3"][$i][2][$j][2][$k][0];
                        $markId = $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][0];

                        $mark = $markStudent."_".$markSemester."_".$markUE."_".$markSubject."_".$markId; ?>
                        <?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1]; ?>
                        <?php if (isset($_SESSION["marksv4"][$i][2][$j][2][$k][2][$l][0])) { ?>
                          <input type="text" name=<?= $mark; ?> value=<?= $_SESSION["marksv4"][$i][2][$j][2][$k][2][$l][0]; ?> placeholder="entrez votre note">/20
                        <?php } else { ?>
                          <input type="text" name=<?= $mark; ?> placeholder="entrez votre note">/20
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
          }
        ?>
      </form>

    </div>


    <?php render("Footer", []); ?>
