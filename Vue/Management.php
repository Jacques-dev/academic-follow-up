

<form id="addElementInSchool" action="../Controller/Manager.php" method="post">

  <button class="learn-more btn-1" type="submit" name="submitManagerEditing">
    <span class="circle" aria-hidden="true">
      <span class="icon arrow"></span>
    </span>
    <span class="button-text">Tout Enregistrer</span>
  </button>

  <div class="container-fluid" id="manager">
    <div class="row">
      <div class="col-lg-3">
        <nav>
          <ul>
            <?php
              $nb_semester = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
              for($i = 0 ; $i < 10 ; $i++) {?>
                <li class="downTag">
                  Semestre
                  <?php $semesterInputName = "semester_".$nb_semester[$i]; ?>
                  <?php if (isset($_SESSION["apiv3"][$i][1])) { ?>
                    <input type="text" name=<?= $semesterInputName; ?> value=<?= $_SESSION["apiv3"][$i][1]; ?> placeholder="num">
                  <?php } else { ?>
                    <input type="text" placeholder="num">
                  <?php } ?>

                  <button name="deleteSemester" value=<?= $_SESSION["apiv3"][$i][0]; ?>><i class="fas fa-trash"></i></button>
                  <i class="fas fa-arrow-down"></i>
                  <ul>
                    <?php for($j = 0 ; $j < count($_SESSION["apiv3"][$i][2]) ; $j++) {?>
                      <li class="rightTag">
                        UE
                        <?php $nomUE = str_replace(' ', '-', $_SESSION["apiv3"][$i][2][$j][1]); ?>
                        <?php $ueInputName = "ue_".$_SESSION["apiv3"][$i][2][$j][0]."_name"; ?>
                        <?php if (isset($_SESSION["apiv3"][$i][2][$j][1])) { ?>
                          <input type="text" name=<?= $ueInputName; ?> value=<?= $nomUE; ?> placeholder="nom">
                        <?php } else { ?>
                          <input type="text" placeholder="nom">
                        <?php } ?>

                        <?php $ueInputCoef = "ue_".$_SESSION["apiv3"][$i][2][$j][0]."_coef"; ?>
                        <?php if (isset($_SESSION["apiv3"][$i][2][$j][3])) { ?>
                          <input type="text" name=<?= $ueInputCoef; ?> value=<?= $_SESSION["apiv3"][$i][2][$j][3]; ?> placeholder="coef">
                        <?php } else { ?>
                          <input type="text" placeholder="coef">
                        <?php } ?>

                        <button name="deleteUE" value=<?= $_SESSION["apiv3"][$i][2][$j][0]; ?>><i class="fas fa-trash"></i></button>
                        <i class="fas fa-arrow-right"></i>
                        <ul>
                          <?php for($k = 0 ; $k < count($_SESSION["apiv3"][$i][2][$j][2]) ; $k++ ) { ?>
                            <li class="rightTag">
                              Matière
                              <?php $nomSubject = str_replace(' ', '-', $_SESSION["apiv3"][$i][2][$j][2][$k][1]); ?>
                              <?php $subjectInputName = "subject_".$_SESSION["apiv3"][$i][2][$j][2][$k][0]."_name"; ?>
                              <?php if (isset($_SESSION["apiv3"][$i][2][$j][1])) { ?>
                                <input type="text" name=<?= $subjectInputName; ?> value=<?= $nomSubject; ?> placeholder="nom">
                              <?php } else { ?>
                                <input type="text" placeholder="nom">
                              <?php } ?>

                              <?php $subjectInputCoef = "subject_".$_SESSION["apiv3"][$i][2][$j][2][$k][0]."_coef"; ?>
                              <?php if (isset($_SESSION["apiv3"][$i][2][$j][2][$k][3])) { ?>
                                <input type="text" name=<?= $subjectInputCoef; ?> value=<?= $_SESSION["apiv3"][$i][2][$j][2][$k][3]; ?> placeholder="coef">
                              <?php } else { ?>
                                <input type="text" placeholder="coef">
                              <?php } ?>

                              <button name="deleteSubject" value=<?= $_SESSION["apiv3"][$i][2][$j][2][$k][0]; ?>><i class="fas fa-trash"></i></button>
                              <i class="fas fa-arrow-right"></i>
                              <ul>
                                <?php for($l = 0 ; $l < count($_SESSION["apiv3"][$i][2][$j][2][$k][2]) ; $l++ ) { ?>
                                  <li>

                                    <?php $typeMark = str_replace(' ', '-', $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1]); ?>
                                    <?php $markInputType = "mark_".$_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][0]."_type"; ?>
                                    <?php if (isset($_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][1])) { ?>
                                      <input type="text" name=<?= $markInputType; ?> value=<?= $typeMark; ?> placeholder="type">
                                    <?php } else { ?>
                                      <input type="text" placeholder="type">
                                    <?php } ?>

                                    <?php $markInputCoef = "mark_".$_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][0]."_coef"; ?>
                                    <?php if (isset($_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2])) { ?>
                                      <input type="text" name=<?= $markInputCoef; ?> value=<?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][2]; ?> placeholder="coef">
                                    <?php } else { ?>
                                      <input type="text" placeholder="coef">
                                    <?php } ?>
                                    <button name="deleteMark" value=<?= $_SESSION["apiv3"][$i][2][$j][2][$k][2][$l][0]; ?>><i class="fas fa-trash"></i></button>
                                  </li>
                                <?php } ?>
                                <?php $insertMark = $_SESSION["apiv3"][$i][2][$j][2][$k][0]; ?>
                                <li><button name="insertMark" value=<?= $insertMark; ?>><i class="fas fa-plus-square"></i></button></li>
                              </ul>
                            </li>
                          <?php } ?>
                          <?php $insertSubject = $_SESSION["apiv3"][$i][2][$j][0]; ?>
                          <li><button name="insertSubject" value=<?= $insertSubject; ?>><i class="fas fa-plus-square"></i></button></li>
                        </ul>
                      </li>
                    <?php } ?>
                    <?php $insertUE = $_SESSION["apiv3"][$i][0]; ?>
                    <li><button name="insertUE" value=<?= $insertUE; ?>><i class="fas fa-plus-square"></i></button></li>
                  </ul>
                </li>
              <?php } ?>
              <li><button name="insertSemester" value="0"><i class="fas fa-plus-square"></i></button></li>
          </ul>
        </nav>
      </div>
    </div>

  </div>
</form>
