
  <?php
    include("../Controller/AverageManagement.php");
    include("../Controller/Fonctions.php");
    include("../BDD/Connexion.php");
    render(false, "Header", ["activePage" => "Ranking"]);
  ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12" align="center" id="head-column">
          <?php
            if (isset($_SESSION["email"])):
              echo $_SESSION["email"];
            endif;
          ?>
        </div>
      </div>
    </div>

    <?php
    $sql = "SELECT id, name, firstname, school, promotion, td_group FROM student WHERE confidentiality  = 'Publique'";
    $sql_all_student_marks = "SELECT mark, id_student, id_subject, coefficient, type FROM student_marks s_m INNER JOIN student s WHERE s.id = s_m.id_student and confidentiality  = 'Publique'";
    $sql_all_student_subject = "SELECT average, id_student, id_subject, id_ue FROM student_subject s_s INNER JOIN student s WHERE s.id = s_s.id_student and confidentiality  = 'Publique'";
    $sql_all_student_ue = "SELECT average, id_student, id_ue, id_semester FROM student_ue s_ue INNER JOIN student s WHERE s.id = s_ue.id_student and confidentiality  = 'Publique'";
    $sql_all_student_semester = "SELECT average, id_student, id_semester FROM student_semester s_s INNER JOIN student s WHERE s.id = s_s.id_student and confidentiality  = 'Publique'";

    $result = $con->query($sql);
    $result_student_marks_bdd = $con->query($sql_all_student_marks);
    $result_student_subject_bdd = $con->query($sql_all_student_subject);
    $result_student_ue_bdd = $con->query($sql_all_student_ue);
    $result_student_semester_bdd = $con->query($sql_all_student_semester);

    $all_student_marks = [];
    $all_student_subject = [];
    $all_student_ue = [];
    $all_student_semester = [];


    $m = $result->fetch_all();
    $a = $result_student_marks_bdd->fetch_all();
    $b = $result_student_subject_bdd->fetch_all();
    $c = $result_student_ue_bdd->fetch_all();
    $d = $result_student_semester_bdd->fetch_all();
    // show($result);
    // show($d);
      // show($result->fetch_all());
      $print_type = "print_semester";

    for ($i = 0 ; $i < $result->num_rows ; $i++) {

      $a_student = [
        "id" => $m[$i][0],
        "name" => $m[$i][1],
        "firstname" => $m[$i][2],
        "school" => $m[$i][3],
        "promotion" => $m[$i][4],
        "td_group" => $m[$i][5]
      ];
      array_push($all_student_marks,[]);

      for ($j = 0 ; $j < $result_student_marks_bdd->num_rows ; $j++){
        $a_mark = [
          "mark" => $a[$j][0],
          "id_student" => $a[$j][1],
          "id_subject" => $a[$j][2],
          "coefficient" => $a[$j][3],
          "type" => $a[$j][4]
        ];
        // show($a_mark);
        // show($a_mark["id_student"]);
        if ($a_mark["id_student"] == $a_student["id"]){
          array_push($all_student_marks[$i],$a_mark);
        }

      }
    }

    for ($i = 0 ; $i < $result->num_rows ; $i++) {

      $a_student = [
        "id" => $m[$i][0],
        "name" => $m[$i][1],
        "firstname" => $m[$i][2],
        "school" => $m[$i][3],
        "promotion" => $m[$i][4],
        "td_group" => $m[$i][5]
      ];
      array_push($all_student_subject,[]);

      for ($j = 0 ; $j < $result_student_marks_bdd->num_rows ; $j++){
        $a_subject = [
          "average" => $b[$j][0],
          "id_student" => $b[$j][1],
          "id_subject" => $b[$j][2],
          "id_ue" => $b[$j][3]
        ];
        // show($a_mark);
        // show($a_mark["id_student"]);
        if ($a_subject["id_student"] == $a_student["id"]){
          array_push($all_student_subject[$i],$a_subject);
        }

      }
    }

    for ($i = 0 ; $i < $result->num_rows ; $i++) {

      $a_student = [
        "id" => $m[$i][0],
        "name" => $m[$i][1],
        "firstname" => $m[$i][2],
        "school" => $m[$i][3],
        "promotion" => $m[$i][4],
        "td_group" => $m[$i][5]
      ];
      array_push($all_student_ue,[]);

      for ($j = 0 ; $j < $result_student_ue_bdd->num_rows ; $j++){
        $an_ue = [
          "average" => $c[$j][0],
          "id_student" => $c[$j][1],
          "id_ue" => $c[$j][2],
          "id_semester" => $c[$j][3]
        ];
        // show($a_mark);
        // show($a_mark["id_student"]);
        if ($an_ue["id_student"] == $a_student["id"]){
          array_push($all_student_ue[$i],$an_ue);
        }

      }
    }

    for ($i = 0 ; $i < $result->num_rows ; $i++) {

      $a_student = [
        "id" => $m[$i][0],
        "name" => $m[$i][1],
        "firstname" => $m[$i][2],
        "school" => $m[$i][3],
        "promotion" => $m[$i][4],
        "td_group" => $m[$i][5]
      ];
      array_push($all_student_semester,[]);

      for ($j = 0 ; $j < $result_student_semester_bdd->num_rows ; $j++){
        // show($a_semester);
        $a_semester = [
          "average" => $d[$j][0],
          "id_student" => $d[$j][1],
          "id_semester" => $d[$j][2]
        ];
        // show($a_mark);
        // show($a_mark["id_student"]);
        if ($a_semester["id_student"] == $a_student["id"]){
          array_push($all_student_semester[$i],$a_semester);
        }

      }
    }

    ?>


   <?php for($i = 0 ; $i < $result->num_rows ; $i++) {
     $a_student = [
       "id" => $m[$i][0],
       "name" => $m[$i][1],
       "firstname" => $m[$i][2],
       "school" => $m[$i][3],
       "promotion" => $m[$i][4],
       "td_group" => $m[$i][5]
     ];
     ?>

     <div class="row">
       <div class="col-lg-1">
         <!-- <?php echo $a_student["firstname"] ?> -->
       </div>
       <div class="col-lg-1">
         <!-- <?php echo $a_student["name"] ?> -->
       </div>
     </div>

     <?php foreach($all_student_marks as $s_s){
      for ($j=0; $j < count($s_s) ; $j++) {
        // show($s_s[$j][0]["id_student"]);
        if ( $s_s[$j][0]["id_student"] == $a_student["id"]){
          // show($s_s[$j][0]["mark"]);
          // show($s_s[$j][0]["type"]);
        }
      }
     } ?>

     <?php
   }
   // show($all_student_marks);
   ?>

   <?php for($i = 0 ; $i < $result->num_rows ; $i++) {
     $a_student = [
       "id" => $m[$i][0],
       "name" => $m[$i][1],
       "firstname" => $m[$i][2],
       "school" => $m[$i][3],
       "promotion" => $m[$i][4],
       "td_group" => $m[$i][5]
     ];
     ?>

     <div class="row">
       <div class="col-lg-1">
         <!-- <?php echo $a_student["firstname"] ?> -->
       </div>
       <div class="col-lg-1">
         <!-- <?php echo $a_student["name"] ?> -->
       </div>
     </div>

     <?php foreach($all_student_subject as $s_s){
      for ($j=0; $j < count($s_s) ; $j++) {
        // show($s_s[$j][0]["id_student"]);
        if ( $s_s[$j][0]["id_student"] == $a_student["id"]){
          // show($s_s[$j][0]["average"]);
          // show($s_s[$j][0]["id_subject"]);
        }
      }
     } ?>

     <?php
   }
   // show($all_student_subject);
   ?>

   <?php for($i = 0 ; $i < $result->num_rows ; $i++) {
     $a_student = [
       "id" => $m[$i][0],
       "name" => $m[$i][1],
       "firstname" => $m[$i][2],
       "school" => $m[$i][3],
       "promotion" => $m[$i][4],
       "td_group" => $m[$i][5]
     ];
     ?>

     <div class="row">
       <div class="col-lg-1">
         <!-- <?php echo $a_student["firstname"] ?> -->
       </div>
       <div class="col-lg-1">
         <!-- <?php echo $a_student["name"] ?> -->
       </div>
     </div>

     <?php foreach($all_student_ue as $s_s){
      for ($j=0; $j < count($s_s) ; $j++) {
        if ( $s_s[$j][0]["id_student"] == $a_student["id"]){
          // show($s_s[$j][0]["average"]);
          // show($s_s[$j][0]["id_ue"]);
        }
      }
     } ?>

     <?php
   }
   // show($all_student_ue);
   ?>

   <?php for($i = 0 ; $i < $result->num_rows ; $i++) {
     $a_student = [
       "id" => $m[$i][0],
       "name" => $m[$i][1],
       "firstname" => $m[$i][2],
       "school" => $m[$i][3],
       "promotion" => $m[$i][4],
       "td_group" => $m[$i][5]
     ];
     ?>

     <div class="row">
       <div class="col-lg-1">
         <!-- <?php echo $a_student["firstname"] ?> -->
       </div>
       <div class="col-lg-1">
         <!-- <?php echo $a_student["name"] ?> -->
       </div>
     </div>

     <?php foreach($all_student_semester as $s_s){
      for ($j=0; $j < count($s_s) ; $j++) {
        // show($s_s[$j][0]["id_student"]);
        if ( $s_s[$j][0]["id_student"] == $a_student["id"]){
          // show($s_s[$j][0]["average"]);
          // show($s_s[$j][0]["id_semester"]);
        }
      }
     } ?>

     <?php
   }
   // show($all_student_semester);
   ?>


 <div class="container">
   <form method="post" id="RankingVue">
        <div class="row">
           <select name="print_type" onchange="changeRankingVue()">
             <option value="<?= $print_type?>" disabled selected>Que voulez vous afficher ?</option>
             <option value="print_all_marks">afficher toutes les notes</option>
             <option value="print_subject">afficher par matiere</option>
             <option value="print_ue">afficher par ue</option>
             <option value="print_semester">afficher par semestre</option>
           </select>
         </div>
   </form>
 </div>

  <div class="container">

    <?php
      $print_type = $_POST["print_type"];
      if ($print_type === "print_semester") {

        show($all_student_semester);
      }
      if ($print_type === "print_ue") {

        show($all_student_ue);
      }
      if ($print_type === "print_subject") {

        show($all_student_subject);
      }
      if ($print_type === "print_all_marks") {

        show($all_student_marks);
      }
    ?>

  </div>


  <?php render(false, "Footer", []); ?>
