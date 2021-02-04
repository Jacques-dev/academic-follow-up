
  <?php
    include("../Controller/AverageManagement.php");
    include("../Controller/Fonctions.php");
    render(false, "Header", ["activePage" => "Ranking"]);
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

    <div class="container-fluid">
      
    </div>



  <?php render(false, "Footer", []); ?>
