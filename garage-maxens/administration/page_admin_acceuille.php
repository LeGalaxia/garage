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
    <title>Page admin</title>
    <link rel="stylesheet" href="../css/admin_acceuil.css" />
</head>
<body>
    <h1 class="centre">PAGE ADMINISTRATEUR</h1>
    <center>
    <a class="ajout" href="pageajoutvehic.php" style="text-decoration:none"> Ajouter un Véhicule </a> <br>
    <a class="modif" href="pagemodifvehic.php" style="text-decoration:none"> Modifier un Véhicule</a> <br>
    <a class="suppr" href="pagesuprim.php" style="text-decoration:none"> Supprimer un Véhicule</a> <br><br>
    <a class="affiche" href="affiche.php" style="text-decoration:none"> Afficher les Véhicules</a> <br><br>
    <a class="logout" href="logout.php" style="text-decoration:none"> Se déconnecter</a>
    </center>
</body>
</html>