
  <?php
    include("Controller/Fonctions.php");
    render(true, "Header", ["activePage" => "Home"]);
  ?>

  <div class="container">

    <div class="row">
      <div class="col-lg-12" align="center" id="head-column">
        <h3>
        <?php
          if (isset($_SESSION["email"])):
            echo $_SESSION["email"];
          endif;
        ?>
      </h3>
      blabla
        <?php show($_SESSION["profil"]); ?>
      </div>
    </div>

    <!-- <?php
      if (!isset($_SESSION["profil"]) && isset($_SESSION["email"])) {
    ?>

    <?php
      }
    ?> -->

  </div>

  <?php render(true, "Footer", []); ?>
