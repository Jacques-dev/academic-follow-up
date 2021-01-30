

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <img class="nav-link" src="/academic-follow-up/Vue/IMAGES/logo1.png" id="logo1">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/academic-follow-up/Home.php">Home</a>
      </li>
      <?php if(isset($_SESSION["email"])): ?>
      <li class="nav-item">
        <a class="nav-link active" href="/academic-follow-up/Vue/Averages.php">Mes notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/academic-follow-up/Vue/Ranking.php">Mes classements</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  <div class="mx-auto order-0">
    <div class="navbar-brand mx-auto">
      My Academic Follow-Up<br>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION["email"])): ?>
        <li class="nav-item">
          <a class="nav-link" href="/academic-follow-up/Vue/Profil.php">Mon profil</a>
        </li>
      <?php endif; ?>
      <?php include("LoginForm.php"); ?>
      <?php include("RegisterForm.php"); ?>
    </ul>
  </div>
</nav>
