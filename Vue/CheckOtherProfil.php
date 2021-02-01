
<?php
  include("../Controller/Fonctions.php");
  render(false, "Header", ["activePage" => "Research"]);
  show($_POST["checkProfil"]);

  if (isset($_POST["checkProfilSubmit"])) {
    $checkProfil = $_POST["checkProfilResults"];
  } else {
    header("Location: 404.php");
  }


?>


<div class="container">

  <div class="row">
    <h2>Mon profil</h2>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-2 ml-lg-auto">
          Prenom
        </div>
        <div class="col-lg-2 mr-lg-auto"><?= $checkProfil[0]; ?></div>
      </div>
      <div class="row">
        <div class="col-lg-2 ml-lg-auto">
          Nom
        </div>
        <div class="col-lg-2 mr-lg-auto"><?= $checkProfil[1]; ?></div>
      </div>
      <div class="row">
        <div class="col-lg-2 ml-lg-auto">
          Ecole
        </div>
        <div class="col-lg-2 mr-lg-auto"><?= $checkProfil[2]; ?></div>
      </div>
      <div class="row">
        <div class="col-lg-2 ml-lg-auto">
          Niveau d'étude
        </div>
        <div class="col-lg-2 mr-lg-auto"><?= $checkProfil[3]; ?></div>
      </div>
      <div class="row">
        <div class="col-lg-2 ml-lg-auto">
          Groupe de TD
        </div>
        <div class="col-lg-2 mr-lg-auto"><?= $checkProfil[4]; ?></div>
      </div>
    </div>
  </div>

</div>



<?php render(false, "Footer", []); ?>
