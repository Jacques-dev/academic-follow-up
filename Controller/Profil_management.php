<?php
include('Fonctions.php');
include("../BDD/Connexion.php");
session_start();

if (isset($_POST['update_infos'])){

  $sql = $con->prepare('UPDATE student SET firstname = ?, name = ?, school = ?, promotion = ?, td_group = ?, email = ? WHERE email = ?');
  $sql->bind_param('sssssss', $new_firstname, $new_name, $new_school, $new_promotion, $new_td_group, $new_email, $old_email);

  $new_firstname=$_POST['new_firstname'];
  $new_name=$_POST['new_name'];
  $new_school=$_POST['new_school'];
  $new_promotion=$_POST['new_promotion'];
  $new_td_group=$_POST['new_td_group'];
  $new_email=$_POST["new_email"];
  $old_email=$_SESSION["email"];

  $sql->execute();

  $popupResult = array("type" => "success", "title" => "Validé", "message" => "Modification enregistré.");

} else {
  $popupResult = array("type" => "warning", "title" => "Attention", "message" => "Erreur dans la modification.");
}

$_SESSION["popupResult"] = $popupResult;

header('Location: /academic-follow-up/Vue/Profil.php');
exit();
?>
