


<?php
  if (isset($_SESSION["email"])) {
?>
  <li class="nav-item">
    <form action="Controller/LoginRegister.php" method="post" id="LoginRegisterButton">
      <button type="submit" class="nav-link popupLoginLogoutButton" name="logout">logout</button>
    </form>
  </li>
<?php
  } else {
?>
  <li class="nav-item">
    <button type="button" class="nav-link popupLoginLogoutButton" onclick="popupLogin()">Login</button>
  </li>
  <li class="nav-item">
    <button type="button" class="nav-link popupRegisterButton" onclick="popupRegister()">Register</button>
  </li>
<?php
  }
?>


<form action="Controller/LoginRegister.php" method="post" id="popupLogin">
  Se connecter<br>
  <input type="text" name="email" placeholder="email"><br>
  <input type="password" name="password" placeholder="mot de passe"><br>
  <input type="checkbox" name="remember" id="remember">
  <label for="remember">Se souvenir de moi</label><br>

  <button type="submit" name="submitConnexion">Se connecter</button>

  <button type="submit">Annuler</button>
</form>
