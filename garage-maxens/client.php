<?php
$server="localhost";
$base="garagemaxens_bdd";
$userdb="client";
$userpwd="";
$connexion=new mysqli($server,$userdb,$userpwd,$base);
if($connexion->connect_error){
	die("Erreur de connexion : ".$connexion->connect_error);
}
?>