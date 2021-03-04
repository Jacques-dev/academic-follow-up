
<div class="container-fluid">
  <?php
    session_start();
    // include("../Controller/StartMarks.php");
    // show($_SESSION["marksv4"]);
    // show($_SESSION["marksv2"]);
    // show($_SESSION["marks"]);
    // show($_SESSION["apiv2"]);

    for($i = 0 ; $i < count($_SESSION["marksv4"]) ; $i++) {?>
      <?php
        $sem = $_SESSION["apiv2"]->getSemesterName($_SESSION["marksv4"][$i][0]);
      ?>
      <div class="row">
        <p>Semestre <?= $sem; ?> --- (<?= $_SESSION["marksv4"][$i][1]; ?>/20)</p>
      </div>

      <?php for($j = 0 ; $j < count($_SESSION["marksv4"][$i][2]) ; $j++) {?>
        <?php
          $ue = $_SESSION["apiv2"]->getUEName($_SESSION["marksv4"][$i][2][$j][0]);
        ?>
        <div class="row">
          &nbsp;&nbsp;&nbsp;&nbsp;
          <p>
            UE --- <?= $ue; ?> (<?= $_SESSION["marksv4"][$i][2][$j][1]; ?>/20)
            coef <?= $_SESSION["apiv3"][$i][2][$j][3]; ?>
            <?php if ($_SESSION["marksv4"][$i][2][$j][1] < 10 && isset($_SESSION["marksv4"][$i][2][$j][1])) { ?>
              <span style="color: red">Cette UE n'est pas acceptable...</span>
            <?php } ?>
          </p>
        </div>

        <?php for($k = 0 ; $k < count($_SESSION["marksv4"][$i][2][$j][2]) ; $k++ ) { ?>
          <?php
            $sub = $_SESSION["apiv2"]->getSubjectName($_SESSION["marksv4"][$i][2][$j][2][$k][0]);
          ?>
          <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <p>
              Matiere --- <?= $sub; ?> (<?= $_SESSION["marksv4"][$i][2][$j][2][$k][1]; ?>/20)
              coef <?= $_SESSION["apiv3"][$i][2][$j][2][$k][3]; ?>

              <?php if ($_SESSION["marksv4"][$i][2][$j][2][$k][1] < 6 && isset($_SESSION["marksv4"][$i][2][$j][2][$k][1])) { ?>
                <span style="color: red">Cette matière n'est pas acceptable...</span>
              <?php } elseif (!isset($_SESSION["marksv4"][$i][2][$j][2][$k][1]) && isset($_SESSION["marksv4"][$i][2][$j][1])) { ?>
                <span style="color: blue">
                  Espérons un
                  <?= whatMarkINeed(10, $_SESSION["apiv3"][$i][2][$j][2], $_SESSION["marksv4"][$i][2][$j][2], $_SESSION["apiv3"][$i][2][$j][2][$k][3], true); ?>
                  pour celle-ci !
                </span>
              <?php } elseif ($_SESSION["marksv4"][$i][2][$j][2][$k][1] >= 6 && isset($_SESSION["marksv4"][$i][2][$j][2][$k][1])) { ?>
                <span style="color: green">La matière est sauve</span>
              <?php } ?>
            </p>
          </div>

            <?php for($l = 0 ; $l < count($_SESSION["marksv4"][$i][2][$j][2][$k][2]) ; $l++ ) { ?>

              <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p>
                  Note ---
                  <?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1]; ?>
                  <?= $_SESSION["marksv4"][$i][2][$j][2][$k][2][$l]; ?>/20
                  coef <?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2]; ?>
                  <?php if ($_SESSION["marksv4"][$i][2][$j][2][$k][1] < 6 && isset($_SESSION["marksv4"][$i][2][$j][2][$k][1])) {
                    if (!isset($_SESSION["marksv4"][$i][2][$j][2][$k][2][$l])) { ?>
                      <span style="color: red">
                        Un petit
                        <?= whatMarkINeed(6, $_SESSION["apiv3"][$i][2][$j][2][$k][2], $_SESSION["marksv4"][$i][2][$j][2][$k][2], $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2], false); ?>
                        pour remonter ça ?
                      </span>
                   <?php
                    }
                  } ?>

                </p>
              </div>

            <?php
          }
        }
      }
    }
  ?>
</div>
