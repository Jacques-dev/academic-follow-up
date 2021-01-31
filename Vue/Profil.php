
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


      <div class="container">
        <div class="row">
          <p><h2>Mon profil</h2> </p>
        </div>
          <form class="container" name="inscription" method="post" action="/academic-follow-up/Controller/Profil_management.php">
              <div class="row">
                <div class="col-lg-12">
                  Prenom
                </div>
                <div class="col-lg-12">
                  <input type="text" value="<?= $profil["firstname"]?>" placeholder="votre prenom" name="firstname"/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  Nom
                </div>
                <div class="col-lg-12">
                  <input type="text" value="<?= $profil["name"]?>" placeholder="votre nom" name="name"/>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  Ecole
                </div>
                <div class="col-lg-12">
                  <input type="text" value="<?= $profil["school"]?>" placeholder="votre ecole" name="school"/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  Promotion :
                </div>
                <div class="col-lg-12">
                   <input type="text" value="<?= $profil["promotion"]?>" placeholder="votre promotion" name="promotion"/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  Groupe de TD :
                </div>
                <div class="col-lg-12">
                  <input type="text" value="<?= $profil["td_group"]?>" placeholder="votre groupe de td" name="td_group"/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <button type="submit">Modifier mes informations</button>
                </div>
              </div>
          </form>
        </div>

    </div>

  <?php render(false, "Footer", []); ?>
