<?php
  include("../Controller/Fonctions.php");
  render("Header", ["activePage" => "Research"]);
  include("../BDD/Connexion.php");
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
  </div>

  <div class="container">
    <p> Recherchez le profil d'une connaissance</p>
    <form class="row" action="CheckOtherProfil.php" method="post">
      <input type="text" name="SearchProfilName" placeholder="Nom">
      <input type="text" name="SearchProfilFirstName" placeholder="Prénom">
      <input type="submit" name="SearchProfilSubmit" value="Chercher">
    </form>


    <?php
      $email = $_SESSION["email"];
      $sql = "SELECT id, name, firstname, school, promotion, td_group FROM student WHERE confidentiality = 'Publique' AND email != '$email'";
      $result = $con->query($sql);
      while ($row = $result->fetch_assoc()) {
        $array = [
          "id" => $row["id"],
          "name" => $row["name"],
          "firstname" => $row["firstname"],
          "school" => $row["school"],
          "promotion" => $row["promotion"],
          "td_group" => $row["td_group"]
        ];
      ?>

      <form class="row" action="CheckOtherProfil.php" method="post">
        <div class="col-lg-2 ml-lg-auto mr-lg-auto">
          <input type="submit" name="checkProfilSubmit" id="checkProfil" value="Voir +">
        </div>

          <?php foreach($array as $attr) :?>
            <input type="hidden" name="checkProfilResults[]" value="<?= $attr; ?>">
          <?php endforeach; ?>

        <div class="col-lg-2 ml-lg-auto mr-lg-auto"><?= $row["name"]; ?></div>
        <div class="col-lg-2 ml-lg-auto mr-lg-auto"><?= $row["firstname"]; ?></div>
        <div class="col-lg-2 ml-lg-auto mr-lg-auto"><?= $row["school"]; ?></div>
        <div class="col-lg-2 ml-lg-auto mr-lg-auto"><?= $row["promotion"]; ?></div>
        <div class="col-lg-2 ml-lg-auto mr-lg-auto"><?= $row["td_group"]; ?></div>
      </form>

    <?php } ?>

  </div>

<?php render("Footer", []); ?>
