
  <?php
    include("../Controller/Fonctions.php");
    include("../BDD/Connexion.php");
    render("Header", ["activePage" => "Ranking"]);
    // show($_SESSION["marksv2"]);
    show($_POST);
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
      <div class="col-lg-4" id="">
        <form action="" method="post">
          <?php
          $school = $_SESSION["profil"]["school"];
          $sql = "SELECT id, num FROM semester WHERE school = '$school' ORDER BY num + 0 ASC";
          $result = $con->query($sql);
          while($row = $result->fetch_assoc()) { ?>
            <button class="row" type="submit" name="rankingSelection" value=<?= $row["id"]; ?>>Semestre <?= $row["num"]; ?>
          <?php } ?>
        </form>
      </div>
      <div class="col-lg-8">
        <?php
        $id = $_POST["rankingSelection"];
        $sql = "SELECT name, firstName, average FROM student s INNER JOIN student_semester ss WHERE s.id = ss.id_student AND ss.id_semester = $id";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()) { ?>
          <div class="">
            <?= $row["name"]." ".$row["firstName"]." : ".$row["average"]; ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <?php render("Footer", []); ?>
