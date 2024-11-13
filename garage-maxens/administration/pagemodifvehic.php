<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Véhicule</title>
</head>
<body>
    <p><a href="page_admin_acceuille.php">Retour page d'acceuil</a><p></p>
    <form method="POST" action="modifvehic.php">
        <h1 class="title">Veuiller saisir la plaque d'immatriculation du véhicule à modifier.</h1>
           Immatriculation :<input type='text' name='immatriculation' id =’immatriculation’/> <br><br>
       
           <input type="submit" value="Valider"/> </form>
           </form>
</body>
</html>