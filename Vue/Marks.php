



<?php
  session_start();
  include("../Controller/StartMarks.php");
  show($_SESSION["marksv3"]);
  for($i = 0 ; $i < count($_SESSION["apiv3"]) ; $i++) {?>

    <div class="row">
      <p>Semestre <?= $_SESSION["apiv3"][$i][0]; ?> --- (<?= $_SESSION["marksv3"][$i][0]; ?>)</p>
    </div>

    <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][1]) ; $j++) {?>

      <div class="row">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <p>UE --- <?= $_SESSION["apiv3"][$i][1][$j][0]; ?> (<?= $_SESSION["marksv3"][$i][1][$j][0]; ?>)</p>
      </div>

      <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][1][$j][1]) ; $k++ ) { ?>

        <div class="row">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <p>Matiere --- <?= $_SESSION["apiv3"][$i][1][$j][1][$k][0]; ?> (<?= $_SESSION["marksv3"][$i][1][$j][1][$k][0]; ?>)</p>
        </div>

          <?php for($l = 1 ; $l < count($_SESSION["marksv3"][$i][1][$j][1][$k]) ; $l++ ) { ?>

            <div class="row">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <p>
                Note ---
                <?= $_SESSION["marksv3"][$i][1][$j][1][$k][$l][0]; ?>
                <?= $_SESSION["marksv3"][$i][1][$j][1][$k][$l][1]; ?>/20
                coef <?= $_SESSION["marksv3"][$i][1][$j][1][$k][$l][2]; ?>
              </p>
            </div>

          <?php
        }
      }
    }
  }
?>
