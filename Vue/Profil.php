
  <?php
    include("../Controller/Fonctions.php");
    render(false, "Header", ["activePage" => "Profil"]);
    session_start();
    show($_SESSION["email"]);
    show($_SESSION["profil"]);
  ?>


    <div class="container">
      <div class="row">
        <div class="col-lg-12" align="center" id="head-column">
          <?php
            if (isset($_SESSION["email"])):
              echo $_SESSION["email"];
            endif;
          ?>
        </div>
      </div>
    </div>


  <?php render(false, "Footer", []); ?>
