
  <?php
    include("../Controller/Fonctions.php");
    render(false, "Header", ["activePage" => "Profil"]);
    session_start();
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
    <div class="container">

      <div class="row">
        <p><h2>Mon profil</h2> </p>
      </div>
      <div class="row">
        <form class="col-lg-8" name="inscription" method="post" action="/academic-follow-up/Controller/Profil_management.php">
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
                <select class="col-lg-4" name="new_school">
                  <option value="<?= $_SESSION["profil"]["school"]?>" selected> <?= $_SESSION["profil"]["school"]?> </option>
                  <option value="EFREI Paris">EFREI Paris</option>
                  <option value="ECE Paris">ECE Paris</option>
                  <option value="EPITA">EPITA</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                Niveau d'étude
              </div>
              <div class="col-lg-12">
                <select class="col-lg-6" name="new_promotion">
                  <option value="<?= $_SESSION["profil"]["promotion"]?>" selected> <?= $_SESSION["profil"]["promotion"]?></option>
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
                confidentialité de vos notes
              </div>
              <div class="col-lg-12">
                <select class="col-lg-2" name="new_confidentiality">
                  <option value="<?= $_SESSION["profil"]["confidentiality"]?>" selected> <?= $_SESSION["profil"]["confidentiality"]?></option>
                  <option value="Privée">Privée</option>
                  <option value="Publique">Publique</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <button type="submit" name="update_infos">Modifier mes informations</button>
              </div>
            </div>
        </form>
        <div class="col-lg-4">
          <p>ON MET LA PHOTO ICI</p>
          <img src="" alt="">
        </div>
      </div>
    </div>
    <div class="container">
      <?php for($i = 0 ; $i < count($_SESSION["apiv3"]) ; $i++) {?>
        <div class="row">
          <p>Semestre ---</p>
          <?php echo $_SESSION["apiv3"][$i][0]; ?>
        </div>
        <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][1]) ; $j++) {?>
          <div class="row">
            <p>UE ---</p>
            <?php echo $_SESSION["apiv3"][$i][1][$j][0]; ?>
          </div>
          <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][1][$j][1]) ; $k++ ) { ?>
            <div class="row">
              <p>Matiere ---</p>
              <?php echo $_SESSION["apiv3"][$i][1][$j][1][$k][0]; ?>
            </div>
          <?php }
        }
      } ?>
    </div>

  <?php render(false, "Footer", []); ?>
