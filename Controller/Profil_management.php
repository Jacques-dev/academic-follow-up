<?php
include('Fonctions.php');
include("../BDD/Connexion.php");
session_start();
if (isset ($_POST['update_infos'])){
  $new_firstname=$_POST['new_firstname'];
  $new_name=$_POST['new_name'];
  $new_school=$_POST['new_school'];
  $new_promotion=$_POST['new_promotion'];
  $new_email=$_POST["new_email"];
  $new_td_group=$_POST['new_td_group'];
  $old_email=$_SESSION["email"];
  show($old_email);
  show($new_email);
  show($new_firstname);
  show($new_name);
  show($new_school);
  show($new_promotion);
  show($new_td_group);

    //1ere tentative marche pas jsp pq//

    // $sql = $con->prepare('UPDATE test SET (firstname, name, school, promotion, td_group, email) VALUES (?, ?, ?, ?, ?, ?) WHERE email = ?');
    // $sql->bind_param('sssssss', $new_firstname, $new_name, $new_school, $new_promotion, $new_td_group, $new_email, $old_email);
    // show($sql);
    // $sql->execute();

    // 2eme maniere de faire une requete préparé marche pas jsp pq //

    // $req = $con->prepare('UPDATE test SET firstname = :new_firstname, name = :new_name, school = :new_school, promotion = :new_promotion, td_group = :new_td_group, email = :new_email WHERE email = :old_email');
    // $req->execute(array(
    //
    //    'new_firstname' => $new_firstname,
    //
    //    'new_name' => $new_name,
    //
    //    'new_school' => $new_school,
    //
    //    'new_promotion' => $new_promotion,
    //
    //    'new_td_group' => $new_td_group,
    //
    //    'new_email' => $new_email,
    //
    //    'old_email' => $old_email
    //    ));
    //------------3eme tentative QUI MARCHE YESS mais pas requete preparé....-----------//

    $query  = "UPDATE test SET firstname = '".$new_firstname."', name  = '".$new_name."', school = '".$new_school."', promotion = '".$new_promotion."', td_group = '".$new_td_group."', email = '".$new_email."' WHERE email = '".$old_email."'";
    $query_two  = "UPDATE user SET email = '".$new_email."' WHERE email = '".$old_email."'";
    show($query);
    show($query_two);
    $result = $con->query($query);
    $resultt = $con->query($query_two);
    $_SESSION["email"] = $new_email;
    $_SESSION["profil"]["name"] = $new_name;
    $_SESSION["profil"]["firstname"] = $new_firstname;
    $_SESSION["profil"]["school"] = $new_school;
    $_SESSION["profil"]["td_group"] = $new_td_group;
    $_SESSION["profil"]["promotion"] = $new_promotion;

    mysql_close();
}
?>
