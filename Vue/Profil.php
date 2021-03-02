

<div class="container-fluid">

  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <h2>Mon profil</h2>
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
                Promotion
              </div>
              <div class="col-lg-12">
                <select class="col-lg-6" name="new_promotion">
                  <option value="<?= $_SESSION["profil"]["promotion"]?>" selected> <?= $_SESSION["profil"]["promotion"]?></option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
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

      <div class="row">
        <?php render("MyMarks", ["idProfil" => $_SESSION["profil"]["id"]]); ?>
      </div>

    </div>
  </div>
</div>
