
<?php
  session_start();

  include("../BDD/Connexion.php");
  include('Fonctions.php');

  if (isset($_POST["submitConnexion"])) {

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

      if (check_email_address($_POST['email'])) {
        $email = $_POST['email'];

        $sql = "SELECT password FROM user WHERE email = '$email'";
        $sqll = "SELECT firstname, name, school, promotion, td_group FROM test WHERE email = '$email'";
        $notes = "SELECT mark, mark_type FROM student_marks WHERE student = '$email'";

        $result = $con->query($sql);
        $resultt = $con->query($sqll);
        $result_marks = $con->query($sqll);

        $rowww = $result_marks->fetch_assoc();
        $roww = $resultt->fetch_assoc();
        $row = $result->fetch_assoc();

        if ($result->num_rows == 1) {

          $decrypted_txt = encrypt_decrypt('decrypt', $row['password']);

          if ($decrypted_txt == $_POST['password']) {

            $profil= array("firstname" => $roww["firstname"],
             "name" => $roww["name"],
             "school" => $roww["school"],
             "td_group" => $roww["td_group"],
             "promotion" => $roww["promotion"]);

            $marks= array("mark" => $rowww["mark"],
             "mark_type" => $rowww["mark_type"],
             "student" => $rowww["student"]);

             $_SESSION["marks"] = $marks;

            $_SESSION["profil"] = $profil;

            $_SESSION["email"] = $_POST["email"];

            $popupResult = array("type" => "success", "title" => "Validé", "message" => "Vous êtes connecté.", "time" => 1000);

            if (isset($_POST["remember"])) {
              $time = time()*60*60*24*365;  //STOCKS 1 YEAR IN THE VAR
              $_SESSION["cookie"] = array($email, $row['password'], $time);
            }

          } else {
            $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Mot de passe incorrect.");
          }

        } else {
          $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Cette adresse mail n'existe pas.");
        }

      } else {
       $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Cette adresse mail n'est pas valide.");
     }

    } else {
      $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Veuillez remplir tous les champs.");
    }

  }

  if (isset($_POST['submitRegister'])) {

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

      if (check_email_address($_POST["email"])) {
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];
        $school = $_POST['school'];
        $promotion = $_POST['promotion'];
        $td_group = $_POST['td_group'];
        $encrypted_txt = encrypt_decrypt('encrypt', $_POST['password']);
        $email = $_POST['email'];

        // creer un profil à chaque utilisateur et remplir les champs du profil avec les informations de $_SESSION
        // Profil p = new Profil($name,$school,$promotio);
        $sql = $con->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
        $sql->bind_param('ss', $email, $encrypted_txt);
        $sqll = $con->prepare("INSERT INTO test (name, firstname, school, promotion, td_group, email) VALUES (?, ?, ?, ?, ?, ?)");
        $sqll->bind_param('ssssss', $name , $firstname, $school, $promotion, $td_group, $email);

        $sqlTest = "SELECT * FROM user WHERE email = '".$email."'";
        $result = $con->query($sqlTest);

        if ($result->num_rows == 0) {
          $sql->execute();
          $sqll->execute();
          $popupResult = array("type" => "success", "title" => "Validé", "message" => "Vous êtes enregistré.", "time" => 1000);
        } else {
          $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Ce compte existe déjà.");
        }

      } else {
        $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Cette adresse mail n'est pas valide.");
      }

    } else {
      $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Veuillez entrer un email et un mot de passe.");
    }

  }

  $_SESSION["popupResult"] = $popupResult;

  if (isset($_POST['logout'])) {
    if (isset($_SESSION["email"])) {
      session_destroy();
      session_start();
      $_SESSION["logout"] = true;
    }
  }

  header('Location: ../Home.php');
  exit();
?>
