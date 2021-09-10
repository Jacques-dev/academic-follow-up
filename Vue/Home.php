
<?php
  if (isset($_SESSION["email"])) {
    $logged = true;
  } else {
    $logged = false;
  }
?>

<div class="container">

  <form id="addElementInSchool" action="../Controller/Manager.php" method="post">
    <input type="text" name="num">
    <button type="submit" name="insertSemester">Tout Enregistrer</button>
  </form>

</div>
