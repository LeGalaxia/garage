<?php
$server="localhost";
$base="garage";
$userdb="client";
$userpwd="";
$connexion=new mysqli($server,$userdb,$userpwd,$base);
if($connexion->connect_error){
	die("Erreur de connexion : ".$connexion->connect_error);
}
?>