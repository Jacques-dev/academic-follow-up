
  <?php
    include("../Controller/Fonctions.php");
    render(false, "Header", ["activePage" => "Average"]);
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

      <div class="row">
        <div class="col-lg-6">
          <p>test daffichage</p>
        </div>
      </div>
    </div>

  <?php render(false, "Footer", []); ?>
