

<form action="/academic-follow-up/Controller/LoginRegister.php" method="post" id="popupRegister">

  <div class="row">
    <div class="col-lg-12">
        <h1>Inscription</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      Email
    </div>
    <div class="col-lg-12">
      <input type="text" name="email">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      mot de passe
    </div>
    <div class="col-lg-12">
      <input type="password" name="password">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      Prenom
    </div>
    <div class="col-lg-12">
      <input type="text" name="firstname"/>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      Nom
    </div>
    <div class="col-lg-12">
      <input type="text" name="name"/>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      Ecole
    </div>
    <div class="col-lg-12">
      <input type="text" name="school"/>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      Niveau :
    </div>
    <div class="col-lg-12">
      <select name="promotion">
        <option value="" disabled selected>Niveau d'étude</option>
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
      Groupe de TD :
    </div>
    <div class="col-lg-12">
      <input type="text" name="td_group"/>
    </div>
  </div>

  <button type="submit" name="submitRegister">Je m'inscris</button>

  <button type="submit">Annuler</button>
</form>
