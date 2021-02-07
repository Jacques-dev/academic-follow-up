<?php
  session_start();
  include("../Controller/StartMarks.php");
  // show($_SESSION["marksv4"]);
  // show($_SESSION["marksv2"]);
  // show($_SESSION["marks"]);
  // show($_SESSION["apiv3"]);
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
              </p>
            </div>

          <?php
        }
      }
    }
  }
?>
