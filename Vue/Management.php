<?php
  include("../Controller/Fonctions.php");
  include("../BDD/Connexion.php");
  render("Header", ["activePage" => "Management"]);
  $apiv3 = $_SESSION["apiv3"];
  // show($apiv3);
?>


<form id="addElementInSchool" action="../Controller/Manager.php" method="post">
  <div class="container-fluid" id="manager">
    <nav>
      <ul>
        <?php
          for($i = 0 ; $i < $_SESSION["apiv2"]->getSemesterFromSchool($_SESSION["profil"]["school"]) ; $i++) {?>
            <li class="downTag">Semestre
              <?php if (isset($_SESSION["apiv3"][$i][1])) { ?>
                <input type="text" value=<?= $_SESSION["apiv3"][$i][1]; ?> placeholder="num">
              <?php } else { ?>
                <input type="text" placeholder="num">
              <?php } ?>
              <i class="fas fa-arrow-down"></i>
              <ul>
                <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][2]) ; $j++) {?>
                  <li class="rightTag">

                    <?php $nomUE = str_replace(' ', '-', $_SESSION["apiv3"][$i][2][$j][1]); ?>
                    <?php if (isset($_SESSION["apiv3"][$i][2][$j][1])) { ?>
                      <input type="text" value=<?= $nomUE; ?> placeholder="nom">
                    <?php } else { ?>
                      <input type="text" placeholder="nom">
                    <?php } ?>

                    <?php if (isset($_SESSION["apiv3"][$i][2][$j][3])) { ?>
                      <input type="text" value=<?= $_SESSION["apiv3"][$i][2][$j][3]; ?> placeholder="coef">
                    <?php } else { ?>
                      <input type="text" placeholder="coef">
                    <?php } ?>

                    <i class="fas fa-arrow-right"></i>
                    <ul>
                      <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][2][$j][2]) ; $k++ ) { ?>
                        <li class="rightTag">

                          <?php $nomSubject = str_replace(' ', '-', $_SESSION["apiv3"][$i][2][$j][2][$k][1]); ?>
                          <?php if (isset($_SESSION["apiv3"][$i][2][$j][1])) { ?>
                            <input type="text" value=<?= $nomSubject; ?> placeholder="nom">
                          <?php } else { ?>
                            <input type="text" placeholder="nom">
                          <?php } ?>

                          <?php if (isset($_SESSION["apiv3"][$i][2][$j][2][$k][3])) { ?>
                            <input type="text" value=<?= $_SESSION["apiv3"][$i][2][$j][2][$k][3]; ?> placeholder="coef">
                          <?php } else { ?>
                            <input type="text" placeholder="coef">
                          <?php } ?>

                          <i class="fas fa-arrow-right"></i>
                          <ul>
                            <?php for($l = 0 ; $l < count($_SESSION["apiv3"][$i][2][$j][2][$k][2]) ; $l++ ) { ?>
                              <li>

                                <?php $typeMark = str_replace(' ', '-', $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1]); ?>
                                <?php if (isset($_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1])) { ?>
                                  <input type="text" value=<?= $typeMark; ?> placeholder="type">
                                <?php } else { ?>
                                  <input type="text" placeholder="type">
                                <?php } ?>

                                <?php if (isset($_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2])) { ?>
                                  <input type="text" value=<?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2]; ?> placeholder="coef">
                                <?php } else { ?>
                                  <input type="text" placeholder="coef">
                                <?php } ?>

                              </li>
                            <?php } ?>
                            <li><button type="button" name="button"><i class="fas fa-plus-square"></i></button></li>
                          </ul>
                        </li>
                      <?php } ?>
                      <li><button type="button" name="button"><i class="fas fa-plus-square"></i></button></li>
                    </ul>
                  </li>
                <?php } ?>
              </li>
              <li><button type="button" name="button"><i class="fas fa-plus-square"></i></button></li>
            </ul>
          <?php } ?>
          <li><button type="button" name="button" onclick="popupAddElementInSchool()"><i class="fas fa-plus-square"></i></button></li>
      </ul>
    </nav>
  </div>
</form>



<?php render("Footer", []); ?>
