

<?php
  include("../BDD/Connexion.php");

  $sql = "SELECT ss.average, ss.semester FROM student s INNER JOIN student_semester ss WHERE s.id = ss.student AND s.id = $idProfil AND s.confidentiality = 'publique' ";
  $result = $con->query($sql);
  while ($row = $result->fetch_assoc()) {

    show("moyenne : ".$row["average"]."<br>");
    show("semester : ".$row["semester"]."<br>");
    for($i = 0 ; $i < count($_SESSION["apiv3"]) ; $i++) {?>
      <div class="row">
        <p>Semestre ---</p>
        <?php echo $_SESSION["apiv3"][$i][0]; ?>
      </div>
      <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][1]) ; $j++) {?>
        <div class="row">
          <p>UE ---</p>
          <?php echo $_SESSION["apiv3"][$i][1][$j][0]; ?>
        </div>
        <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][1][$j][1]) ; $k++ ) { ?>
          <div class="row">
            <p>Matiere ---</p>
            <?php echo $_SESSION["apiv3"][$i][1][$j][1][$k][0]; ?>
          </div>
        <?php }
      }
    }

  }
?>
