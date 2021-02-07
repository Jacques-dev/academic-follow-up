

<?php
  include("../BDD/Connexion.php");
  include("../Controller/Fonctions.php");
  render("Header", ["activePage" => "Home"]);
  // show($_SESSION["marksv4"]);
?>

<div class="container">

  <div class="row">
    <div class="col-lg-12" align="center" id="head-column" style="background-color: <?= $_SESSION['manager'] ? '#3978c4' : '#63d55f' ?>">

      <h3>
      <?php
        if (isset($_SESSION["email"])):
          echo $_SESSION["email"];
        endif;
      ?>
    </h3>
      <?php show($_SESSION["profil"]["name"]);
      show($_SESSION["profil"]["firstname"]); ?>
    </div>
  </div>

</div>

<?php render("Footer", []); ?>
