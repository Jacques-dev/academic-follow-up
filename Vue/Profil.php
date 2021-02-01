
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
                Email
              </div>
              <div class="col-lg-12">
                <input class="col-lg-4" type="text" value="<?= $_SESSION["email"]?>" placeholder="votre email" name="new_email"/>
              </div>
            </div>
              <div class="row">
                <div class="col-lg-12">
                  Prenom
                </div>
                <div class="col-lg-12">
                  <input class="col-lg-4" type="text" value="<?= $_SESSION["profil"]["firstname"]?>" placeholder="votre prenom" name="new_firstname"/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  Nom
                </div>
                <div class="col-lg-12">
                  <input class="col-lg-4" type="text" value="<?= $_SESSION["profil"]["name"]?>" placeholder="votre nom" name="new_name"/>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  Ecole
                </div>
                <div class="col-lg-12">
                  <input class="col-lg-4" type="text" value="<?= $_SESSION["profil"]["school"]?>" placeholder="votre ecole" name="new_school"/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  Niveau d'étude
                </div>
                <div class="col-lg-12">
                  <select class="col-lg-2" name="new_promotion">
                    <option value="<?= $_SESSION["profil"]["promotion"]?>" selected> <?= $_SESSION["profil"]["promotion"]?>ème année </option>
                    <option value="1">L1</option>
                    <option value="2">L2</option>
                    <option value="3">L3</option>
                    <option value="4">M1</option>
                    <option value="5">M2</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  Groupe de TD
                </div>
                <div class="col-lg-12">
                  <input class="col-lg-2" type="text" value="<?= $_SESSION["profil"]["td_group"]?>" placeholder="votre groupe de td" name="new_td_group"/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <button type="submit" name="update_infos">Modifier mes informations</button>
                </div>
              </div>
          </form>
        </div>
    </div>

  <?php render(false, "Footer", []); ?>
