<?php
//vérification si il y a une session pour pouvoir utiliser le fichier "connexion.php"


// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}


$server="localhost";
$base="garage";
$userdb="admin_garage";
$userpwd="5.kK:&M]aiZQ&E#";
$connexion=new mysqli($server,$userdb,$userpwd,$base);
if($connexion->connect_error){
	die("Erreur de connexion : ".$connexion->connect_error);
}
?>