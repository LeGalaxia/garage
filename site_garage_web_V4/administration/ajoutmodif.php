<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>


<?php
include "connexion.php";
$immatriculation=$_POST['immatriculation'];
$marque=$_POST['marque'];
$modele=$_POST['modele'];
$anneecircu=$_POST['anneecircu'];
$prix=$_POST['prix'];
$rtrgarage=$_POST['rtrgarage'];
$cvfiscaux=$_POST['cvfiscaux'];
$description=$_POST['description'];


$sql = "UPDATE vehicule SET immatriculation='$immatriculation', marque='$marque', modele='$modele', anneecircu='$anneecircu', prix='$prix', rtrgarage='$rtrgarage', cvfiscaux='$cvfiscaux', description_vehic='$description' WHERE immatriculation='$immatriculation';"; // la requête doit être sur une seule ligne
$connexion->query($sql);
if(!$connexion->error){echo 'les donnée ont bien été inséré dans la base de données<br>';}
mysqli_close($connexion);

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
<p><a href="page_admin_acceuille.php">Retour page d'acceuil</a><p>
</body>
</html>