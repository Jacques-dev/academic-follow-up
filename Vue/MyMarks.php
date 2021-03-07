
<div class="container-fluid" id="mymarks">
  <?php
    session_start();
  ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="well no-padding">
        <div>
          <ul class="nav nav-list nav-menu-list-style">
            <?php for($i = 0 ; $i < count($_SESSION["marksv4"]) ; $i++) {?>
              <?php $sem = $_SESSION["apiv2"]->getSemesterName($_SESSION["marksv4"][$i][0]); ?>
              <li style="width: 100%;">
                <label class="tree-toggle nav-header glyphicon-icon-rpad">
                  <span class="glyphicon glyphicon-folder-close m5"></span>
                  Semestre <?= $sem; ?> --- (<?= $_SESSION["marksv4"][$i][1]; ?>/20)
                  <span class="menu-collapsible-icon glyphicon glyphicon-chevron-down"></span>
                </label>
                <?php for($j = 0 ; $j < count($_SESSION["marksv4"][$i][2]) ; $j++) { ?>
                  <?php $ue = $_SESSION["apiv2"]->getUEName($_SESSION["marksv4"][$i][2][$j][0]); ?>
                  <ul class="nav nav-list tree">
                    <li><label class="tree-toggle nav-header">
                      UE --- <?= $ue; ?> (<?= $_SESSION["marksv4"][$i][2][$j][1]; ?>/20)
                      coef <?= $_SESSION["apiv3"][$i][2][$j][3]; ?>
                      <?php if ($_SESSION["marksv4"][$i][2][$j][1] < 10 && isset($_SESSION["marksv4"][$i][2][$j][1])) { ?>
                        <span style="color: red">Cette UE n'est pas acceptable...</span>
                      <?php } ?>
                    </label>
                    <?php for($k = 0 ; $k < count($_SESSION["marksv4"][$i][2][$j][2]) ; $k++ ) { ?>
                      <?php $sub = $_SESSION["apiv2"]->getSubjectName($_SESSION["marksv4"][$i][2][$j][2][$k][0]); ?>
                      <ul class="nav nav-list tree">
                        <li>
                          <label class="tree-toggle nav-header">
                            Matiere --- <?= $sub; ?> (<?= $_SESSION["marksv4"][$i][2][$j][2][$k][1]; ?>/20)
                            coef <?= $_SESSION["apiv3"][$i][2][$j][2][$k][3]; ?>

                            <?php if ($_SESSION["marksv4"][$i][2][$j][2][$k][1] < 6 && isset($_SESSION["marksv4"][$i][2][$j][2][$k][1])) { ?>
                              <span style="color: red">Cette matière n'est pas acceptable...</span>
                            <?php } elseif (!isset($_SESSION["marksv4"][$i][2][$j][2][$k][1]) && isset($_SESSION["marksv4"][$i][2][$j][1])) { ?>
                              <span style="color: blue">
                                Espérons un
                                <?= whatMarkINeed(10, $_SESSION["apiv3"][$i][2][$j][2], $_SESSION["marksv4"][$i][2][$j][2], $_SESSION["apiv3"][$i][2][$j][2][$k][3], true); ?>
                                pour celle-ci !
                              </span>
                            <?php } elseif ($_SESSION["marksv4"][$i][2][$j][2][$k][1] >= 6 && isset($_SESSION["marksv4"][$i][2][$j][2][$k][1])) { ?>
                              <span style="color: green">La matière est sauve</span>
                            <?php } ?>
                          </label>
                          <?php for($l = 0 ; $l < count($_SESSION["marksv4"][$i][2][$j][2][$k][2]) ; $l++ ) { ?>
                            <ul class="nav nav-list tree">
                              <li><a href="#">
                                Note ---
                                <?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1]; ?>
                                <?= $_SESSION["marksv4"][$i][2][$j][2][$k][2][$l]; ?>/20
                                coef <?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2]; ?>
                                <?php if ($_SESSION["marksv4"][$i][2][$j][2][$k][1] < 6 && isset($_SESSION["marksv4"][$i][2][$j][2][$k][1])) {
                                  if (!isset($_SESSION["marksv4"][$i][2][$j][2][$k][2][$l])) { ?>
                                    <span style="color: red">
                                      Un petit
                                      <?= whatMarkINeed(6, $_SESSION["apiv3"][$i][2][$j][2][$k][2], $_SESSION["marksv4"][$i][2][$j][2][$k][2], $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2], false); ?>
                                      pour remonter ça ?
                                    </span>
                                 <?php
                                  }
                                } ?>
                              </a></li>
                            </ul>
                          <?php } ?>
                        </li>
                      </ul>
                      <?php } ?>
                    </li>
                  </ul>
                <?php } ?>
              </li>
              <li class="divider"></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

</div>
