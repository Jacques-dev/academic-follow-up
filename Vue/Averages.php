

  <?php
    include("../Controller/Fonctions.php");
    render(false, "Header", ["activePage" => "Average"]);
  ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12" align="center" id="head-column">
          <?php
            if (isset($_SESSION["email"])):
              echo $_SESSION["email"];
            endif;
          ?>
        </div>
      </div>

      <?php
        // show($_SESSION["profil"]["school"]);
        // show($_SESSION["apiv2"]);
        // show($_SESSION["apiv3"]->getSemester());
        // show($_SESSION["apiv2"]->getSchool());

        for($i = 0 ; $i < $_SESSION["apiv2"]->getSemesterFromSchool($_SESSION["profil"]["school"]) ; $i++) {
            $sem = $_SESSION["apiv2"]->getSemesterId($_SESSION["apiv3"][$i][0]);
          ?>
          <div class="row">
            <p>Semestre <?= $sem; ?> --- (<?= $_SESSION["apiv3"][$i][1]; ?>/20)</p>
          </div>

          <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][2]) ; $j++) {?>
            <?php
              $ue = $_SESSION["apiv2"]->getUEId($_SESSION["apiv3"][$i][2][$j][0]);
            ?>
            <div class="row">
              &nbsp;&nbsp;&nbsp;&nbsp;
              <p>UE --- <?= $ue; ?> (<?= $_SESSION["apiv3"][$i][2][$j][1]; ?>/20)</p>
            </div>

            <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][2][$j][2]) ; $k++ ) { ?>
              <?php
                $sub = $_SESSION["apiv2"]->getSubjectId($_SESSION["apiv3"][$i][2][$j][2][$k][0]);
              ?>
              <div class="row">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p>Matiere --- <?= $sub; ?> (<?= $_SESSION["apiv3"][$i][2][$j][2][$k][1]; ?>/20)</p>
              </div>

                <?php for($l = 2 ; $l < count($_SESSION["apiv3"][$i][2][$j][2][$k]) ; $l++ ) { ?>

                  <div class="row">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p>
                      Note ---
                      <?= $_SESSION["apiv3"][$i][2][$j][2][$k][$l][0]; ?>
                      <?= $_SESSION["apiv3"][$i][2][$j][2][$k][$l][1]; ?>/20
                      coef <?= $_SESSION["apiv3"][$i][2][$j][2][$k][$l][2]; ?>
                    </p>
                  </div>

                <?php
              }
            }
          }
        }
      ?>


      <!-- <div class="row">
        <div class="col-lg-3">
          <div class="container">

          	<div class="horizontal">
          		<div class="verticals four">
          			<div class="menu-parent style1">
          				<ul class="menu">

          					<li class="active menu-child">
          						<a href="#"><i class="fas fa-layer-group"></i>Semestre</a>
          						<ul>
                        <form action="../Controller/AverageManagement.php" method="post">
                          <li><button type="submit" value="Semestre 5">Semestre 5</button></li>
                          <li><button type="submit" value="Semestre 6">Semestre 6</button></li>
                        </form>
          						</ul>
          					</li>

                    <li class="active menu-child">
          						<a href="#"><i class="fas fa-layer-group"></i>UE</a>
          						<ul>
                        <form action="../Controller/AverageManagement.php" method="post">
                          <li>
                            <label for="ue1">UE 1</label>
                            <input type="checkbox" name="ue1" id="ue1">
                          </li>
                          <li>
                            <label for="ue2">UE 2</label>
                            <input type="checkbox" name="ue2" id="ue2">
                          </li>
                        </form>
          						</ul>
          					</li>
          				</ul>
          			</div>
          		</div>
          	</div>
          </div>
        </div>

        <div class="col-lg-9">
          <div class="row">

            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-2 ml-lg-auto mr-lg-auto">UE</div>
                <div class="col-lg-2 ml-lg-auto mr-lg-auto">Matière</div>
                <div class="col-lg-2 ml-lg-auto mr-lg-auto">Type</div>
                <div class="col-lg-2 ml-lg-auto mr-lg-auto">Coef</div>
                <div class="col-lg-2 ml-lg-auto mr-lg-auto">Moyenne</div>
              </div>

              <div class="row">
                <button class="btn btn-secondary dropdown-toggle" type="button" onclick="dropdown('ue1')">
                  UE 1
                </button>

                <div class="col-lg-12 dropdown" id="ue1">
                  <div class="row">
                    <div class="dropdown-item col-lg-2 ml-lg-auto mr-lg-auto"></div>
                    <div class="dropdown-item col-lg-2 ml-lg-auto mr-lg-auto">Matières</div>
                    <div class="dropdown-item col-lg-2 ml-lg-auto mr-lg-auto">Types</div>
                    <div class="dropdown-item col-lg-2 ml-lg-auto mr-lg-auto">Coefficients</div>
                    <div class="dropdown-item col-lg-2 ml-lg-auto mr-lg-auto">Moyenne</div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div> -->

    </div>


    <?php render(false, "Footer", []); ?>
