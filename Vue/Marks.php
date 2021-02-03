<?php
  session_start();
  include("../Controller/StartMarks.php");
  // show($_SESSION["marksv3"]);
  // show($_SESSION["marksv2"]);
  // show($_SESSION["marks"]);
  // show($_SESSION["apiv3"]);
  // show($_SESSION["marksv3"][0][2][0][0]);
  for($i = 0 ; $i < count($_SESSION["marksv3"]) ; $i++) {?>
    <?php
      $sem = $_SESSION["apiv2"]->getSemesterId($_SESSION["marksv3"][$i][0]);
    ?>
    <div class="row">
      <p>Semestre <?= $sem; ?> --- (<?= $_SESSION["marksv3"][$i][1]; ?>/20)</p>
    </div>

    <?php for($j = 0 ; $j < count($_SESSION["marksv3"][$i][2]) ; $j++) {?>
      <?php
        $ue = $_SESSION["apiv2"]->getUEId($_SESSION["marksv3"][$i][2][$j][0]);
      ?>
      <div class="row">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <p>UE --- <?= $ue; ?> (<?= $_SESSION["marksv3"][$i][2][$j][1]; ?>/20)</p>
      </div>

      <?php for($k = 0 ; $k < count($_SESSION["marksv3"][$i][2][$j][2]) ; $k++ ) { ?>
        <?php
          $sub = $_SESSION["apiv2"]->getSubjectId($_SESSION["marksv3"][$i][2][$j][2][$k][0]);
        ?>
        <div class="row">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <p>Matiere --- <?= $sub; ?> (<?= $_SESSION["marksv3"][$i][2][$j][2][$k][1]; ?>/20)</p>
        </div>

          <?php for($l = 2 ; $l < count($_SESSION["marksv3"][$i][2][$j][2][$k]) ; $l++ ) { ?>

            <div class="row">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <p>
                Note ---
                <?= $_SESSION["marksv3"][$i][2][$j][2][$k][$l][0]; ?>
                <?= $_SESSION["marksv3"][$i][2][$j][2][$k][$l][1]; ?>/20
                coef <?= $_SESSION["marksv3"][$i][2][$j][2][$k][$l][2]; ?>
              </p>
            </div>

          <?php
        }
      }
    }
  }
?>
