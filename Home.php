
  <?php
    include("Controller/Fonctions.php");
    render(true, "Header", ["activePage" => "Home"]);
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


    <!-- <div class="row">
      <form action="index.html" method="post">

      </form>
    </div> -->


  </div>

  <?php render(true, "Footer", []); ?>
