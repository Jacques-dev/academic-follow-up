<?php
  include("../Controller/Fonctions.php");
  include("../BDD/Connexion.php");
  render("Header", ["activePage" => "Management"]);
  $apiv3 = $_SESSION["apiv3"];
  // show($apiv3);
?>



<div class="container-fluid" id="manager">

  <nav>
    <ul>
      <?php
        for($i = 0 ; $i < $_SESSION["apiv2"]->getSemesterFromSchool($_SESSION["profil"]["school"]) ; $i++) {?>
          <li class="downTag">Semestre <?= $_SESSION["apiv3"][$i][1]; ?>
            <i class="fas fa-arrow-down"></i>
            <ul>
              <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][2]) ; $j++) {?>
                <li class="rightTag">
                  <?= $_SESSION["apiv3"][$i][2][$j][1]; ?>
                  <i class="fas fa-arrow-right"></i>
                  <ul>
                    <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][2][$j][2]) ; $k++ ) { ?>
                      <li class="rightTag">
                        <?= $_SESSION["apiv3"][$i][2][$j][2][$k][1]; ?>
                        <i class="fas fa-arrow-right"></i>
                        <ul>
                          <?php for($l = 0 ; $l < count($_SESSION["apiv3"][$i][2][$j][2][$k][2]) ; $l++ ) { ?>
                            <li><?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1]; ?></li>
                          <?php } ?>
                          <li><a href="#"><i class="fas fa-plus-square"></i></a></li>
                        </ul>
                      </li>
                    <?php } ?>
                    <li><a href="#"><i class="fas fa-plus-square"></i></a></li>
                  </ul>
                </li>
              <?php } ?>
            </li>
            <li><a href="#"><i class="fas fa-plus-square"></i></a></li>
          </ul>

        <?php }
      ?>
      <li><a href="#"><i class="fas fa-plus-square"></i></a></li>
    </ul>
  </nav>

  <!-- <nav>
    <ul>
      <li class="downTag">menu 1
        <i class="fas fa-arrow-down"></i>
        <ul>
          <li>item 1_1</li>
          <li class="rightTag">item 1_2
            <i class="fas fa-arrow-right"></i>
            <ul>
              <li>item 1_2-1</li>
              <li>item 1_2-2</li>
              <li>item 1_2-3</li>
              <li>item 1_2-4</li>
            </ul>
          </li>
          <li class="rightTag">item 1_3
            <i class="fas fa-arrow-right"></i>
            <ul>
              <li>item 1_3-1</li>
              <li>item 1_3-2</li>
              <li>item 1_3-3</li>
            </ul>
          </li>
          <li class="rightTag">item 1_4
            <i class="fas fa-arrow-right"></i>
            <ul>
              <li>item 1_4-1</li>
              <li>item 1_4-2</li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="downTag">menu 2
        <i class="fas fa-arrow-down"></i>
        <ul>
          <li>item 2_1</li>
          <li>item 2_1</li>
          <li class="rightTag">item 2_1
            <i class="fas fa-arrow-right"></i>
            <ul>
              <li>item 2_1-1</li>
              <li>item 2_1-2</li>
              <li>item 2_1-3</li>
              <li>item 2_1-4</li>
            </ul>
          </li>
        </ul>
      </li>
      <li> <a href="#"><i class="fas fa-plus-square"></i></a> </li>
    </ul>
  </nav> -->

</div>



<?php render("Footer", []); ?>
