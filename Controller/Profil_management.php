<?php
include('Fonctions.php');
session_start();
if (isset ($_POST['valider'])){
    //On récupère les valeurs entrées par l'utilisateur :

    /*on lance la commande (mysql_query) et au cas où,
    on rédige un petit message d'erreur si la requête ne passe pas (or die)
    (Message qui intègrera les causes d'erreur sql)*/
    // mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
// "UPDATE users SET nom = $1, prenom = $2, email = $3, telephone = $4 WHERE email=$3"
    $sql = $con->prepare("UPDATE test SET (firstname, name, school, promotion, td_group, email) VALUES (?, ?, ?, ?, ?, ?) WHERE email = ?");
    $sql->bind_param('ssssss', $firstname, $name, $school, $promotion, $td_group, $new_email, $old_email);
    $firstname=$_POST['firstname'];
    $name=$_POST['name'];
    $school=$_POST['school'];
    $promotion=$_POST['promotion'];
    $new_email=$_POST["email"];
    $old_email=$_SESSION["email"];
    $td_group=$_POST['td_group'];

    show($name);
    die();

    $sql->execute();

    mysql_close();
}
?>
