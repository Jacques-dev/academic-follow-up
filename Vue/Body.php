<?php
  $page = $_GET["page"];
  include("../BDD/Connexion.php");
  include("../Controller/Fonctions.php");
  render("Header", ["activePage" => $page]);
?>

<div class="container-fluid">

  <div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-10">
      <?php render($page, []); ?>
    </div>

</div>

<?php render("Footer", []); ?>
