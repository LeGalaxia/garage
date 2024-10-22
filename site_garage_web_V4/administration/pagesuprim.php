<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer</title>
</head>
<body>
    <p><a href="page_admin_acceuille.php">Retour page d'acceuil </a><p>
        <form method="POST" action="supprvehic.php">
         <h1 class="title">Veuiller saisir la plaque d'immatriculation du véhicule à supprimer.</h1>
            Immatriculation :<input type='text' name='immatriculation' id =’immatriculation’/> <br><br>
        
            <input type="submit" value="Supprimer"/> </form>
            </form>
</body>
</html>